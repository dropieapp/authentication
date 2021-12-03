<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agent;
use Illuminate\Support\Facades\Hash;

class CreateAgentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agent::create([
            'name' => 'Agent Doe',
            'email' => 'agentdoe@gmail.com',
            'password' => Hash::make('12345678'),
            'phone_number' => '1234567890'
        ]);
    }
}
