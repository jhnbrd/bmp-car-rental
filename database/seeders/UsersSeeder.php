<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->admin_account();
        $this->mechanic_account();
        $this->cashier_account();
        $this->test_customers();
    }

    public function admin_account(): void
    {
        $user = User::create([
            'username' => 'admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('bmpcars2025'),
            'role' => 'Employee',
            'picture_path' => 'assets/user_profile_pictures/admin.jpg',
        ]);

        Employee::create([
            'first_name' => 'System',
            'last_name' => 'Admin',
            'user_id' => $user->id,
            'role' => 'Admin',
        ]);
    }

    public function mechanic_account(): void
    {
        $user = User::create([
            'username' => 'mechanictest',
            'email' => 'mechanic@test.com',
            'password' => Hash::make('bmpcars2025'),
            'role' => 'Employee',
            'picture_path' => 'assets/user_profile_pictures/mechanictest.png',
        ]);

        Employee::create([
            'first_name' => 'System',
            'last_name' => 'Mechanic',
            'user_id' => $user->id,
            'role' => 'Mechanic',
        ]);
    }

    public function cashier_account(): void
    {
        $user = User::create([
            'username' => 'cashiertest',
            'email' => 'cashier@test.com',
            'password' => Hash::make('bmpcars2025'),
            'role' => 'Employee',
            'picture_path' => 'assets/user_profile_pictures/cashiertest.png',
        ]);

        Employee::create([
            'first_name' => 'System',
            'last_name' => 'Cashier',
            'user_id' => $user->id,
            'role' => 'Cashier',
        ]);
    }

    public function test_customers(): void
    {
        $user = User::create([
            'username' => 'jhiannejoseberida',
            'email' => 'jhiannejoseberida@gmail.com',
            'password' => Hash::make('yanjisamatest'),
            'role' => 'Customer',
            'picture_path' => 'assets/user_profile_pictures/jhiannejoseberida.jpg',
        ]);

        Customer::create([
            'first_name' => 'Jhianne Jose',
            'middle_name' => 'Cañete',
            'last_name' => 'Berida',
            'user_id' => $user->id,
            'province' => 'Davao del Sur',
            'city' => 'City of Davao',
            'barangay' => 'Ula',
            'address' => 'Purok 1 Rose Street',
            'phone_number' => '09157680262',
            'driver_license_number' => 'L01-22-300489',
            'license_expiration_date' => '2027-03-18',
            'license_img_path' => 'license_images/1745171884_jihan_license.jpg',
        ]);
    }
}
