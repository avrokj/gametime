<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'Game Time',
            'email' => 'info@gametime.ee',
            'password' => Hash::make('GameTime1234')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'Jan Kõrva',
            'email' => 'jan.korva@gmail.com',
            'password' => Hash::make('jank1234')
        ]);
        $admin->assignRole('Admin');

        // Creating Game Manager User
        $gameManager = User::create([
            'name' => 'Karel Maarma',
            'email' => 'manager@gametime.ee',
            'password' => Hash::make('muqeet1234')
        ]);
        $gameManager->assignRole('Game Manager');
    }
}
