<?php

namespace App\Http\Controllers;

use App\Models\CarDamage;
use App\Models\CarDamageStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CarDamageController extends Controller
{
    public function showDamagedCars(): RedirectResponse|View
    {
        // $damagedCars = Car::where('status', 'Damaged')
        //     ->with('carModel')
        //     ->get();
        
        // $totalDamagedCars = $damagedCars->count();
        // $underRepairCount = $damagedCars->where('repair_status', 'Under Repair')->count();
        // $repairCompletedCount = $damagedCars->where('repair_status', 'Repair Completed')->count();
        // $totalRepairCost = $damagedCars->sum('damage_cost');

        // return view('employee.damaged_cars', [
        //     'damagedCars' => $damagedCars,
        //     'totalDamagedCars' => $totalDamagedCars,
        //     'underRepairCount' => $underRepairCount,
        //     'repairCompletedCount' => $repairCompletedCount,
        //     'totalRepairCost' => $totalRepairCost
        // ]);

        $carDamages = CarDamage::all();

        return view('employee.damaged_cars', ['carDamages' => $carDamages]);
    }

    public function updateRepairStatus(int $car_damage_id, Request $request): RedirectResponse
    {
        $car_damage = CarDamage::findOrFail($car_damage_id);

        $damageStatus = CarDamageStatus::create([
            'car_damage_id' => $car_damage->id,
            'status' => $request->repairStatus,
            'additional_notes' => $request->repairParts,
            'updated_by_id' => Auth::user()->id,
        ]);

        $car_damage->update(['latest_repair_status' => $damageStatus->id, 'repair_cost' => $request->repairCost, 'repair_desc' => $request->repairParts,]);

        return redirect()->route('damaged.cars')->with('success', 'Car damage update successful.');
    }
}
