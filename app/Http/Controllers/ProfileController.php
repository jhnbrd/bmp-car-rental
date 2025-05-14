<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str; 

class ProfileController extends Controller
{
    /**
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('employee.profile');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }

    public function updatePicture(Request $request)
    {

        $request->validate([
            'profile_picture' => ['required', 'image', 'max:2048'],
        ]);

        $user = User::find(Auth::user()->id);

        if ($user->picture_path && Storage::exists($user->picture_path)) {
            Storage::delete($user->picture_path);
        }

        $file = $request->file('profile_picture');
        $extension = $file->getClientOriginalExtension();
        $filename = $user->username . '.' . $extension;
        $file->move(public_path(path: 'assets/user_profile_pictures'), $filename);
        $path = 'assets/user_profile_pictures/' . $filename;
        // $path = $file->storeAs('assets/user_profile_pictures', $filename, 'public');

        // dd($file);

        $user->picture_path = $path;
        $user->save();

        return back()->with('success', 'Profile picture updated successfully.');
    }
}
