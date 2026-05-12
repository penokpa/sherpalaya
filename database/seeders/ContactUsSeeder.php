<?php

namespace Database\Seeders;

use App\Models\ContactUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        ContactUs::create([
                'full_name' => 'Harry Kane',
                'email' => 'harry@kane.com',
                'mobile_number' => 9812345678,
                'message' => 'Trophyless for Tottenham. Now for Bayern',
        ]);
        ContactUs::create([
                'full_name' => 'Paul Pogba',
                'email' => 'paul@pogba.com',
                // 'mobile_number' => 9812345678,
                'message' => 'Sad career ending',
        ]);
        ContactUs::create([
                'full_name' => 'Mo Salah',
                'email' => 'mohammed@salah.com',
                'mobile_number' => 9812345678,
                'message' => 'Living Legend',
        ]);
    }
}
