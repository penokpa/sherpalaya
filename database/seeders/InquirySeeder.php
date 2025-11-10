<?php

namespace Database\Seeders;

use App\Enums\InquiryType;
use App\Models\Inquiry;
use App\Models\Trek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trek = Trek::first();
        $trek->inquiries()->create([
            'full_name' => 'Kane',
            'type' => InquiryType::BOOKING,
            'email' => 'wwe@kane.com',
            'message' => 'Red Monster from hell',
        ]);
        $trek->inquiries()->create([
            'full_name' => 'John Cena',
            'type' => InquiryType::INQUIRY,
            'email' => 'john@cena.com',
            'message' => 'Attitude Respect',
        ]);
        // create([
        //     'full_name' => 'Randy Orton',
        //     'email' => 'randy@orton.com',
        //     'message' => 'The Viper/ Legend Killer',
        // ]);
    }
}
