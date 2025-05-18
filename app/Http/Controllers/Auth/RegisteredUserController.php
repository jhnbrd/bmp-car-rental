<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class RegisteredUserController extends Controller
{

    public function create(): View
    {
        return view('auth.register');
    }


    public function store(Request $request): RedirectResponse
    {   
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', 'min:8'],
            'is_banned' => ['required', 'boolean']
        ]);



        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            // Create User
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'Customer',
            ]);

            $customerData = [
                'first_name' => $request->firstname,
                'middle_name' => $request->middlename,
                'last_name' => $request->lastname,
                'user_id' => $user->id,
                'is_banned' => $request->is_banned, 
            ];

            // Create Customer
            Customer::create($customerData);

            event(new Registered($user));

            Auth::login($user);

            DB::commit();
            Log::info(DB::getQueryLog());
            return redirect(route('dashboard', absolute: false));
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            Log::info(DB::getQueryLog());
            return back()->withErrors(['error' => 'Registration failed. Please try again.']);
        }
    }

    /**
     * Fetches the name of a location (province, city, or barangay) from the PSGC API.
     *
     * @param string $code The PSGC code of the location.
     * @return string|null The name of the location, or null if the API call fails.
     */
    private function fetchNameFromApi(string $code, string $endpoint): ?string
    {
        try {
            $client = new \GuzzleHttp\Client([
                'verify' => false, // This line bypasses certificate verification (USE WITH CAUTION!)
            ]);
            $response = $client->get("https://psgc.gitlab.io/api/{$endpoint}/");
    
            // Check if the request was successful (status code in the 2xx range)
            if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                $data = json_decode($response->getBody(), true);
                if (is_array($data)) {
                    foreach ($data as $location) {
                        Log::info("Checking {$endpoint}: Code from API: " . ($location['code'] ?? 'No Code') . ", Code from Request: " . $code);
                        if (isset($location['code']) && $location['code'] === $code) {
                            return $location['name'] ?? null;
                        }
                    }
                    Log::warning("PSGC code '{$code}' not found in {$endpoint}.");
                    return null;
                } else {
                    Log::error("PSGC API response for {$endpoint} is not a valid JSON array.");
                    return null;
                }
            } else {
                Log::error("PSGC API request failed for {$endpoint}. Status: {$response->getStatusCode()} - " . $response->getReasonPhrase());
                return null;
            }
        } catch (\Exception $e) {
            Log::error("Error during PSGC API request for {$endpoint}: {$e->getMessage()}");
            return null;
        }
    }
}