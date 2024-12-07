<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Juan Pérez',
            'email' => 'juanperez@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'María García',
            'email' => 'mariagarcia@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
