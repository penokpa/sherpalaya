<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            'name' => 'Emily Carter',
            'title' => 'Unforgettable Everest Base Camp Trek',
            'description' => 'The Everest Base Camp trek was an experience of a lifetime! The guides were knowledgeable, the accommodations were comfortable, and the breathtaking views made every step worth it. Highly recommend this company for anyone seeking an authentic adventure in Nepal.',
        ]);

        Review::create([
            'name' => 'Michael Johnson',
            'title' => 'Amazing Annapurna Circuit Trek',
            'description' => 'A well-organized trek with fantastic guides and porters. The landscapes were mesmerizing, from lush green forests to snow-capped peaks. A truly enriching experience, thanks to the professional and friendly team.',
        ]);

        Review::create([
            'name' => 'Sophia Williams',
            'title' => 'Cultural Tour of Kathmandu Valley',
            'description' => 'A wonderful cultural experience visiting the historic sites of Kathmandu, Bhaktapur, and Patan. The guide was very knowledgeable about Nepalese history and culture. The tour was well-paced and well-organized!',
        ]);

        Review::create([
            'name' => 'James Brown',
            'title' => 'Thrilling White Water Rafting in Trishuli River',
            'description' => 'The rafting trip on the Trishuli River was full of excitement! The rapids were exhilarating yet safe, and the guides ensured a thrilling and secure experience. Perfect for adventure seekers!',
        ]);

        Review::create([
            'name' => 'Olivia Taylor',
            'title' => 'Luxury Tour with Excellent Hospitality',
            'description' => 'From the moment we landed, everything was taken care of smoothly. Luxurious hotels, comfortable transport, and top-notch customer service made our Nepal trip truly enjoyable. Highly recommended for a hassle-free experience!',
        ]);

        Review::create([
            'name' => 'Daniel Martinez',
            'title' => 'Bardia National Park Safari - Close to Nature',
            'description' => 'A wonderful jungle safari experience in Bardia National Park! Spotted rhinos, elephants, and even a Bengal tiger! The resort was comfortable, and the guides were fantastic. A must-do for wildlife lovers.',
        ]);

        Review::create([
            'name' => 'Emma Robinson',
            'title' => 'Scenic Pokhara Tour & Paragliding Adventure',
            'description' => 'Pokhara is a dream destination, and the paragliding experience over Phewa Lake was breathtaking! The team was professional, making it an easy and safe experience. Highly recommended!',
        ]);

        Review::create([
            'name' => 'William Anderson',
            'title' => 'Mardi Himal Trek - Hidden Gem of Nepal',
            'description' => 'An underrated but stunning trek! The Mardi Himal route offers spectacular mountain views without the crowds. Great guides and excellent organization. Perfect for those looking for a peaceful trekking experience.',
        ]);

        Review::create([
            'name' => 'Isabella Thomas',
            'title' => 'Honeymoon in Nepal – Romantic & Adventurous',
            'description' => 'Our honeymoon in Nepal was a perfect mix of adventure and relaxation. From a scenic helicopter tour to Everest to cozy resorts in Nagarkot, everything was beyond our expectations. Thank you for making it so special!',
        ]);

        Review::create([
            'name' => 'David Wilson',
            'title' => 'Volunteer and Trekking Experience',
            'description' => 'A truly meaningful trip where we volunteered in a local village before heading on a short trek. It was fulfilling to give back while exploring the stunning landscapes of Nepal. A unique and rewarding experience!',
        ]);
    }
}
