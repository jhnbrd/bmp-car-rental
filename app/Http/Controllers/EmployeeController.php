<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\User;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(Request $request): RedirectResponse
    {

        // dd($request);

    //     "first_name" => "Josh Andrei"
    //   "last_name" => "Magcalas"
    //   "email" => "jam04@gmail.com"
    //   "username" => "jam04"
    //   "password" => "12345678"

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

    public function dashboard(): View
    {
        return view('employee.dashboard');
    }

    public function rental_agreement(): View
    {
        return view('employee.rental_agreement');
    }

    public function customer_records(): View
    {
        $customers = Customer::all();
        return view('employee.customer_records', ['customers' => $customers]);
    }

    public function employee_records(): View
    {
        $employees = Employee::all();
        return view('employee.employee', ['employees' => $employees]);
    }

    public function booking_management(): View
    {
        $bookings = Employee::all();
        return view('employee.bookings', ['bookings' => $bookings]);
    }

    
}
