<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name' => 'Customer Doe',
            'email' => 'customerdoe@gmail.com',
            'password' => Hash::make('12345678'),
            'phone_number' => '1234567890'
        ]);
    }
}
