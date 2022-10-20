<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Dinda Brilian',
            'email' => 'dinda@foodiest.com',
            'email_verified_at' => now(),
            'password' => Hash::make('foodiest123'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Handika Kristofan',
            'email' => 'handika@foodiest.com',
            'email_verified_at' => now(),
            'password' => Hash::make('foodiest123'),
        ]);

        $user->assignRole('user');
    }
}
