<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Customer;
use App\Models\Employee;

class EmployeeController extends Controller
{
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
