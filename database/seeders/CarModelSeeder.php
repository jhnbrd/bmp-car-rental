<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarModel;


class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarModel::truncate();

        $carModels = [
            [
                'brand' => 'Nissan',
                'model_name' => 'Kicks',
                'model_year' => 2024,
                'model_desc' => 'e-POWER VL',
                'color' => 'White',
                'engine_type' => '3-Cylinder DOHC 12-Valve CVTC with Electric Motor',
                'engine_displacement' => 1198,
                'fuel_type' => 'Gasoline',
                'seat_capacity' => 5,
                'car_dimensions' => '4,300 mm x 1,760 mm x 1,615 mm',
                'car_type' => 'SUV',
                'img_file_path' => 'assets/car_model_images/nissan_kicks_2024.png',
            ],
            [
                'brand' => 'Mitsubishi',
                'model_name' => 'Montero Sport',
                'model_year' => 2022,
                'model_desc' => '4WD 8AT',
                'color' => 'Black',
                'engine_type' => ' 4-Cylinder',
                'engine_displacement' => 2398,
                'fuel_type' => 'Diesel',
                'seat_capacity' => 7,
                'car_dimensions' => '4,825 mm x 1,815 mm',
                'car_type' => 'SUV',
                'img_file_path' => 'assets/car_model_images/mitsubishi_montero_sport_2024.png',
            ],
            [
                'brand' => 'Suzuki',
                'model_name' => 'Jimny',
                'model_year' => 2023,
                'model_desc' => 'GLX AT Rhino Edition',
                'color' => 'Chiffon Ivory Metallic',
                'engine_type' => ' 4-Cylinder',
                'engine_displacement' => 1462,
                'fuel_type' => 'Diesel',
                'seat_capacity' => 4,
                'car_dimensions' => '3,650 mm x 1,645 mm',
                'car_type' => 'SUV',
                'img_file_path' => 'assets/car_model_images/suzuki_jimny_rhino_2023.png',
            ],
        ];
    }
}
