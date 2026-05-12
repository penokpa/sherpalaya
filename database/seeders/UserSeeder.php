<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user = User::create([
            'name' => 'Sherpalaya Admin',
            'email' => 'admin@sherpalaya.com',
            'password' => 'password',
        ]);
        $user->assignRole('super_admin');
        $user->save();
    }
}
