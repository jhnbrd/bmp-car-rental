<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'role' => ['required', 'string', 'in:Admin,Cashier,Mechanic'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Employee',
        ]);

        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'user_id' => $user->id,
            'role' => $request->role,
        ]);
        
        return redirect()->back()->with('success', 'Employee added successfully.');

    }

    public function update(Request $request, $id): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['required', 'string', 'in:Admin,Cashier,Mechanic'],
            'is_active' => ['sometimes', 'in:0,1'],
        ]);
        // dd($request->all());

        // Find the employee
        $employee = Employee::findOrFail($id);

        // Find the associated user
        $user = User::findOrFail($employee->user_id);

        // Update the user's email
        $user->email = $request->email;
        $user->save();

        // Update the employee
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->role = $request->role;
        if ($request->is_active == '1') {
            $employee->is_active = true;
        } elseif ($request->is_active == '0') {
            $employee->is_active = false;
        }
        $employee->save();

        return redirect()->back()->with('success', 'Employee updated successfully.');
    }

    public function dashboard(): View
    {
        $totalCustomers = User::where('role', 'Customer')->count();
        $availableCarsCount = Car::where('status', 'Available')->count();
        $carsCurrentlyRented = Car::where('status', 'Booked')->count();
        $carsUnderMaintenance = Car::where('status', 'Under Maintenance')->count();
        $carsDamaged = Car::where('status', 'Damaged')->count();

        return view('employee.dashboard', [
            'totalCustomers' => $totalCustomers,
            'availableCarsCount' => $availableCarsCount,
            'carsCurrentlyRented' => $carsCurrentlyRented,
            'carsUnderMaintenance' => $carsUnderMaintenance,
            'carsDamaged' => $carsDamaged,
        ]);
    }

    public function rental_agreement(): View
    {
        return view('employee.rental_agreement');
    }

    public function customer_records(): View
    {
        $customers = Customer::all();
        return view('employee.customer', ['customers' => $customers]);
    }

    public function employee_records(): View
    {
        $employees = Employee::all();
        return view('employee.employee', ['employees' => $employees]);
    }

    public function booking_management(): View
    {
        $allBookings = Booking::all();

        $bookings = [
            'allBookings' => $allBookings,
            'unpaidBookings' => $this->getBookingsByStatus('Unpaid'),
            'paidBookings' => $this->getBookingsByStatus('Paid'),
            'approvedBookings' => $this->getBookingsByStatus('Approved'),
            'forPickUpBookings' => $this->getBookingsByStatus('For Pick-up'),
            'ongoingBookings' => $this->getBookingsByStatus('Ongoing'),
            'dueForReturnBookings' => $this->getBookingsByStatus('Due for Return'),
            'reportedBookings' => $this->getBookingsByStatus('Reported'),
        ];

        return view('employee.manage_bookings', $bookings);
    }

    private function getBookingsByStatus(string $status)
    {
        return Booking::whereHas('latestStatus', function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->with(['customer', 'car', 'latestStatus'])
            ->orderBy(
                BookingStatus::select('status_date')
                    ->whereColumn('booking_id', 'bookings.id')
                    ->latest(),
                'desc'
            )
            ->paginate(6, ['*'], $status);
    }

    public function booking_history(): View
    {
        $booking_history = Employee::all();
        $customers = Customer::all();
        return view('employee.booking_history', ['booking_history' =>  $booking_history ], ['customers' => $customers]);
    }

    public function booking_unsettled(): View
    {
        $bookings = Employee::all();
        return view('employee.manage_bookings', ['bookings' => $bookings]);
    }

    public function car_modification(): View
    {
        $car_modification = Employee::all();
        return view('employee.car_modification', ['car_modification' => $car_modification]);
    }

    
}
