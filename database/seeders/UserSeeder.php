<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama' => 'Admin DonorConnect',
            'email' => 'admin@donorconnect.com',
            'password' => Hash::make('password'),
        ]);
    }
}