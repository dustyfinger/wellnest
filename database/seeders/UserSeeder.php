<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Admin WellNest',
            'email' => 'admin@gmaul.com',
            'no_telepon' => '081234567890',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'nama' => 'Adit',
            'email' => 'adit@gmail.com',
            'no_telepon' => '089876543210',
            'password' => Hash::make('adit1234'),
            'role' => 'user',
        ]);
    }
}
