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
use App\Models\Payment;

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
                BookingStatus::query()
                    ->whereColumn('booking_id', 'bookings.id')
                    ->orderBy('status_date', 'desc')
                    ->limit(1)
                    ->select('status_date'),
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

    public function damagedCars(): View
    {
        $damagedCars = Car::where('status', 'Damaged')
            ->with('carModel')
            ->get();
        
        $totalDamagedCars = $damagedCars->count();
        $underRepairCount = $damagedCars->where('repair_status', 'Under Repair')->count();
        $repairCompletedCount = $damagedCars->where('repair_status', 'Repair Completed')->count();
        $totalRepairCost = $damagedCars->sum('damage_cost');

        return view('employee.damaged_cars', [
            'damagedCars' => $damagedCars,
            'totalDamagedCars' => $totalDamagedCars,
            'underRepairCount' => $underRepairCount,
            'repairCompletedCount' => $repairCompletedCount,
            'totalRepairCost' => $totalRepairCost
        ]);
    }

    public function updateRepairStatus(Request $request)
    {
        $request->validate([
            'carId' => 'required|exists:cars,id',
            'repairStatus' => 'required|in:Under Repair,Repair Completed,Pending Assessment',
            'repairCost' => 'required|numeric|min:0',
            'repairParts' => 'required|string'
        ]);

        $car = Car::findOrFail($request->carId);
        $car->repair_status = $request->repairStatus;
        $car->damage_cost = $request->repairCost;
        $car->repair_parts = $request->repairParts;
        $car->save();

        return response()->json([
            'success' => true,
            'message' => 'Repair status updated successfully'
        ]);
    }

    public function payment_history(Request $request): View
    {
        $query = Payment::query()
            ->with(['booking.customer', 'booking.car.carModel'])
            ->orderBy('created_at', 'desc');

        // Apply filters
        if ($request->filled('payment_type')) {
            if ($request->payment_type === 'booking') {
                $query->whereNotNull('booking_id');
            } elseif ($request->payment_type === 'repairment') {
                $query->whereNull('booking_id');
            }
        }

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        if ($request->filled('status')) {
            $query->where('is_verified', $request->status === 'verified');
        }

        $payments = $query->paginate(10);

        // Calculate summary statistics
        $totalPayments = Payment::sum('paid_amount');
        $bookingPayments = Payment::whereNotNull('booking_id')->sum('paid_amount');
        $repairmentCosts = Payment::whereNull('booking_id')->sum('paid_amount');
        $pendingPayments = Payment::where('is_verified', false)->sum('paid_amount');

        return view('employee.payment_history', compact(
            'payments',
            'totalPayments',
            'bookingPayments',
            'repairmentCosts',
            'pendingPayments'
        ));
    }
}
