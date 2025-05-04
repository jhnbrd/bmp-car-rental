<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::insert(self::$cars);
    }

    /**
     * The car data.
     *
     * @var array
     */
    protected static $cars = [
        [
            'car_model_id' => 2,
            'odometer' => 40648,
            'registration_number' => '244160851',
            'registration_date' => '2025-03-18',
            'status' => 'Available',
        ],
        [
            'car_model_id' => 2,
            'odometer' => 75356,
            'registration_number' => '123456789',
            'registration_date' => '2025-01-20',
            'status' => 'Available',
        ],
        [
            'car_model_id' => 2,
            'odometer' => 51038,
            'registration_number' => '345678901',
            'registration_date' => '2025-02-15',
            'status' => 'Available',
        ],
        [
            'car_model_id' => 2,
            'odometer' => 31238,
            'registration_number' => '467891234',
            'registration_date' => '2025-04-10',
            'status' => 'Available',
        ],
        [
            'car_model_id' => 6,
            'odometer' => 54320,
            'registration_number' => '987654321',
            'registration_date' => '2025-03-01',
            'status' => 'Available',
        ],
        [
            'car_model_id' => 6,
            'odometer' => 12340,
            'registration_number' => '876543219',
            'registration_date' => '2025-04-23',
            'status' => 'Available',
        ],
        [
            'car_model_id' => 6,
            'odometer' => 35452,
            'registration_number' => '765432198',
            'registration_date' => '2025-02-10',
            'status' => 'Available',
        ],
    ];
}
