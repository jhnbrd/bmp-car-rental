<?php

namespace App\Http\Controllers;

use App\models\CarDamage;
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
}
