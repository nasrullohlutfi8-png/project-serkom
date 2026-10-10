<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat akun Admin (tanpa email, sesuai kolom fillable)
        User::create([
            'name' => 'Administrator',
            'password' => Hash::make('123456'), 
            'role' => 'admin',
        ]);

        // Membuat akun Operator/User tambahan (opsional)
        User::create([
            'name' => 'Operator',
            'password' => Hash::make('123456'),
            'role' => 'operator',
        ]);
    }
}