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
        // Car Model 1
        [
            'car_model_id' => 1,
            'odometer' => 25879,
            'license_plate' => 'ABC 1234',
            'registration_number' => '111222333',
            'registration_date' => '2025-03-01',
            'status' => 'Available',
        ],
        [
            'car_model_id' => 1,
            'odometer' => 62145,
            'license_plate' => 'DEF 5678',
            'registration_number' => '444555666',
            'registration_date' => '2025-01-15',
            'status' => 'Available',
        ],
        // Car Model 2
        [
            'car_model_id' => 2,
            'odometer' => 40648,
            'license_plate' => 'KMN 9876',
            'registration_number' => '244160851',
            'registration_date' => '2025-03-18',
            'status' => 'Available',
        ],
        [
            'car_model_id' => 2,
            'odometer' => 75356,
            'license_plate' => 'LPO 5432',
            'registration_number' => '123456789',
            'registration_date' => '2025-01-20',
            'status' => 'Available',
        ],
        [
            'car_model_id' => 2,
            'odometer' => 51038,
            'license_plate' => '',
            'registration_number' => '345678901',
            'registration_date' => '2025-02-15',
            'status' => 'Available',
        ],
        [
            'car_model_id' => 2,
            'odometer' => 31238,
            'license_plate' => 'QRS 1098',
            'registration_number' => '467891234',
            'registration_date' => '2025-04-10',
            'status' => 'Available',
        ],
        // Car Model 3
        [
            'car_model_id' => 3,
            'odometer' => 18765,
            'license_plate' => 'GHI 9012',
            'registration_number' => '777888999',
            'registration_date' => '2025-02-22',
            'status' => 'Available',
        ],
        [
            'car_model_id' => 3,
            'odometer' => 92345,
            'license_plate' => 'JKL 3456',
            'registration_number' => '000111222',
            'registration_date' => '2025-04-05',
            'status' => 'Available',
        ],
        // Car Model 4
        [
            'car_model_id' => 4,
            'odometer' => 78901,
            'license_plate' => 'MNO 7890',
            'registration_number' => '333444555',
            'registration_date' => '2025-03-25',
            'status' => 'Available',
        ],
        [
            'car_model_id' => 4,
            'odometer' => 45678,
            'license_plate' => 'PQR 1234',
            'registration_number' => '666777888',
            'registration_date' => '2025-01-01',
            'status' => 'Available',
        ],
        // Car Model 5
        [
            'car_model_id' => 5,
            'odometer' => 32109,
            'license_plate' => 'STU 5678',
            'registration_number' => '999000111',
            'registration_date' => '2025-04-15',
            'status' => 'Available',
        ],
        [
            'car_model_id' => 5,
            'odometer' => 87654,
            'license_plate' => 'VWX 9012',
            'registration_number' => '222333444',
            'registration_date' => '2025-02-05',
            'status' => 'Available',
        ],
        // Car Model 6
        [
            'car_model_id' => 6,
            'odometer' => 54320,
            'license_plate' => 'ZAB 7890',
            'registration_number' => '987654321',
            'registration_date' => '2025-03-01',
            'status' => 'Available',
        ],
        [
            'car_model_id' => 6,
            'odometer' => 12340,
            'license_plate' => 'TUV 6543',
            'registration_number' => '876543219',
            'registration_date' => '2025-04-23',
            'status' => 'Available',
        ],
        [
            'car_model_id' => 6,
            'odometer' => 35452,
            'license_plate' => 'WXY 2109',
            'registration_number' => '765432198',
            'registration_date' => '2025-02-10',
            'status' => 'Available',
        ],
        // Car Model 7
        [
            'car_model_id' => 7,
            'odometer' => 67890,
            'license_plate' => 'YZA 3456',
            'registration_number' => '654321098',
            'registration_date' => '2025-01-25',
            'status' => 'Available',
        ],
        [
            'car_model_id' => 7,
            'odometer' => 23456,
            'license_plate' => 'BCD 7890',
            'registration_number' => '543210987',
            'registration_date' => '2025-03-10',
            'status' => 'Available',
        ],
    ];
}
