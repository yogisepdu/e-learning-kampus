<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Admin User',
            'email' => 'BtO9o@example.com',
            'password' => bcrypt('password'),
            'role' => 'lecturer',
        ]);

         User::create([
            'name' => 'Mahasiswa A',
            'email' => 'mahasiswaA@example.com',
            'password' => Hash::make('password123'),
            'role' => 'student',
        ]);

        User::create([
            'name' => 'Mahasiswa B',
            'email' => 'mahasiswaB@example.com',
            'password' => Hash::make('password123'),
            'role' => 'student',
        ]);

        User::create([
            'name' => 'Mahasiswa C',
            'email' => 'mahasiswaC@example.com',
            'password' => Hash::make('password123'),
            'role' => 'student',
        ]);
    }
}
