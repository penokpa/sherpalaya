<?php

namespace Database\Seeders;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Settings\PageSetting;
use App\Models\WebsiteSetting;
use App\Settings\LegalSetting;
use Illuminate\Database\Seeder;
use App\Settings\AboutUsSetting;
use App\Settings\CompanySetting;
use App\Enums\WebsiteSettingType;
use App\Settings\ContactUsSetting;
use App\Helpers\CuratorSeederHelper;
use App\Settings\LandingPageSetting;

class WebsiteSettingSeeder extends Seeder
{
    protected array $websiteSettings = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedLandingPageSettings();
        $this->seedPageSettings();
        $this->seedContactUsSettings();
        $this->seedCompanySettings();
        $this->seedLegalSettings();
        $this->seedAboutUsSettings();
    }

    public function seedLandingPageSettings()
    {
        $landingPageSetting = app(LandingPageSetting::class);

        $landingPageSetting->animation_sections = [
            [
                'id' => fake()->regexify('[A-Za-z]{10}'),
                'title' => 'Expeditions',
                'wait_time' => 1,
                'content' => 'Embark on the ultimate adventure with our expertly guided 8000ers, 7000ers, 6000ers and more expeditions',
                'image_id' => '',
                'images' => [
                    CuratorSeederHelper::resolveFileData(public_path('/photos/qualitymount2.png'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/mountain2.jpg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/basecamp.JPG'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/k2.jpg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/expeditionlanding.jpeg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/mountain8.jpg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/mountain9.jpg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/basecamp4.JPG'))->id,
                ],
                'icon_id' => CuratorSeederHelper::resolveFileData(public_path('/icons/expedition.svg'))->id,
            ],
            [
                'id' => fake()->regexify('[A-Za-z]{10}'),
                'title' => 'Trek',
                'wait_time' => 1,
                'content' => 'Discover the magic of Nepal’s breathtaking trails with our immersive treks all around the East to the West',
                'image_id' => '',
                'images' => [
                    CuratorSeederHelper::resolveFileData(public_path('/photos/basecamp2.JPG'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/trekbanner.jpg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/trek1.JPG'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/trek2.JPG'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/treklanding.jpeg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/mountain3.jpg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/P1030503.JPG'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/activity4.jpg'))->id,
                ],
                'icon_id' => CuratorSeederHelper::resolveFileData(public_path('/icons/trek.svg'))->id,
            ],

            [
                'id' => fake()->regexify('[A-Za-z]{10}'),
                'title' => 'Activities',
                'wait_time' => 1,
                'content' => 'Indulge and explore Nepali society and culture in the best way possible',
                'image_id' => '',
                'images' => [
                    CuratorSeederHelper::resolveFileData(public_path('/photos/activity2.JPG'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/activity3.JPG'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/activity.JPG'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/culture.jpg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/culture2.jpg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/culture3.jpg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/service.jpg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/temple.jpg'))->id,
                ],
                'icon_id' => CuratorSeederHelper::resolveFileData(public_path('/icons/culture.svg'))->id,
            ],
            [
                'id' => fake()->regexify('[A-Za-z]{10}'),
                'title' => 'Sherpalaya',
                'wait_time' => 1,
                'content' => 'Explore with us RIGHT NOW!',
                'image_id' => CuratorSeederHelper::resolveFileData(public_path('/photos/qualitymount.png'))->id,
                'icon_id' => CuratorSeederHelper::resolveFileData(public_path('/photos/logo.png'))->id,
            ],
        ];

        $landingPageSetting->ask_for_animation_title = 'Immerse yourself';
        $landingPageSetting->ask_for_animation_content = 'Do you want to take part in a short visual animation related to Sherpalaya?';
        $landingPageSetting->ask_for_animation_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/qualitymount2.png'))->id;
        $landingPageSetting->ask_for_animation_positive_response = 'Ok';
        $landingPageSetting->ask_for_animation_negative_response = 'Skip';


        $landingPageSetting->animation_button_text = 'Proceed';
        $landingPageSetting->animation_button_icon_id = CuratorSeederHelper::resolveFileData(public_path('/icons/scroll-down.svg'))->id;


        $landingPageSetting->animation_sound_id = CuratorSeederHelper::resolveFileData(public_path('/audio/sherpasound.wav'))->id;


        $landingPageSetting->expedition_activity_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/mountain1.jpg'))->id;
        $landingPageSetting->trek_activity_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/trekbanner.jpg'))->id;
        $landingPageSetting->tour_activity_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/culture.jpg'))->id;
        $landingPageSetting->peak_activity_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/services.jpg'))->id;
        $landingPageSetting->expedition_activity_content = "Embark on the ultimate adventure with our expertly guided expeditions. Whether conquering the towering Himalayas or traversing remote landscapes, our seasoned team ensures a thrilling yet safe journey. Experience high-altitude challenges, breathtaking scenery, and a deep connection with nature like never before.";
        $landingPageSetting->trek_activity_content = "Discover the magic of Nepal’s breathtaking trails with our immersive treks. From the legendary Everest Base Camp to the serene Annapurna Circuit, we take you through diverse landscapes, rich cultures, and unforgettable moments. Let each step lead you to a new adventure!";
        $landingPageSetting->tour_activity_content = "Unveil the wonders of Nepal with our expertly curated tours. Explore ancient heritage, vibrant cities, and stunning natural beauty with our knowledgeable guides. Whether cultural, spiritual, or scenic, every tour is crafted for an enriching and unforgettable experience.";
        $landingPageSetting->peak_activity_content = "Reach new heights with our exhilarating peak climbing adventures. Designed for both seasoned climbers and ambitious beginners, we provide expert guidance, safety assurance, and unmatched Himalayan views. Conquer your dreams, one summit at a time!";

        $landingPageSetting->expedition_activity_count = '50+';
        $landingPageSetting->trek_activity_count = '200+';
        $landingPageSetting->tour_activity_count = '1000+';
        $landingPageSetting->peak_activity_count = '100+';

        $landingPageSetting->stat_traveller_count = '500+';
        $landingPageSetting->stat_association_count = '100+';
        $landingPageSetting->stat_customer_feedback = '9.3';
        $landingPageSetting->stat_success_rate = '96';

        $landingPageSetting->parallax_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/mountain8.jpg'))->id;


        $landingPageSetting->save();
    }

    public function seedPageSettings()
    {
        $pageSetting = app(PageSetting::class);

        $pageSetting->expedition_page_cover_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/expeditionlanding.jpeg'))->id;
        $pageSetting->trek_page_cover_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/treklanding.jpeg'))->id;
        $pageSetting->tour_page_cover_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/culture2.jpg'))->id;
        $pageSetting->peak_page_cover_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/lobuche.jpg'))->id;
        $pageSetting->service_page_cover_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/serviceslanding.jpeg'))->id;

        $pageSetting->expedition_page_content = "Push your limits and embark on an extraordinary Himalayan expedition. Our expertly guided journeys take you to some of the highest and most challenging peaks on the planet. Experience raw adventure, breathtaking landscapes, and the triumph of reaching new heights with our experienced mountaineers and support teams.";
        $pageSetting->trek_page_content = "Step into the heart of the Himalayas with our unforgettable trekking adventures. Walk through lush forests, rugged mountain trails, and culturally rich villages as you discover Nepal’s most iconic routes. Whether you seek a short scenic trek or an epic multi-day journey, we create experiences that inspire.";
        $pageSetting->tour_page_content = "Experience Nepal beyond the mountains with our immersive tours. From exploring Kathmandu’s UNESCO-listed sites to witnessing the serene beauty of Pokhara and the wildlife of Chitwan, our tours blend history, nature, and culture into an unforgettable adventure tailored just for you.";
        $pageSetting->peak_page_content = "Challenge yourself with our thrilling peak climbing adventures. Designed for climbers of all levels, our expertly guided expeditions help you conquer Nepal’s stunning peaks, from beginner-friendly summits to technical ascents. Let the mountains call, and we’ll guide you to the top!";
        $pageSetting->service_page_content = "We offer a wide range of services to ensure your journey in Nepal is seamless and unforgettable. From guided expeditions and trekking adventures to cultural tours, logistics, permits, and safety support, we handle every detail so you can focus on the adventure ahead.";


        $pageSetting->save();
    }

    public function seedContactUsSettings()
    {
        $contactUsSetting = app(ContactUsSetting::class);

        $contactUsSetting->content = "We’d love to hear from you! Whether you’re planning your next big adventure, have questions about our trips, or need expert guidance, our team is here to help. Reach out to us for personalized travel advice, booking inquiries, or any other assistance. Let’s make your Himalayan journey a reality—contact us today!";
        $contactUsSetting->address = 'Thamel, Kathmandu';
        $contactUsSetting->contact = '+977- 981343434/+01- 55313536';
        $contactUsSetting->working_hour = 'Sun-Thurs: 11-5 / Fri: 12-3 / Sat: Closed';

        $contactUsSetting->save();
    }

    public function seedCompanySettings()
    {
        $companySetting = app(CompanySetting::class);

        $companySetting->company_logo_id = CuratorSeederHelper::resolveFileData(public_path('/photos/logo.png'))->id;
        $companySetting->company_name = "Sherpalaya Pvt. Ltd.";
        $companySetting->company_address = "Kathmandu, thamel, street no 6";
        $companySetting->company_email = "sherpalaya@gmail.com";
        $companySetting->company_contact_number = "+977 9800112233";

        $companySetting->facebook_url = "https://www.facebook.com/sherpalaya.trek.1/";
        $companySetting->instagram_url = "https://www.instagram.com/sherpalaya/";
        $companySetting->youtube_url = "https://www.youtube.com/@sherpalaya";
        $companySetting->tiktok_url = "https://www.tiktok.com/@sherpalaya";

        $companySetting->save();
    }

    public function seedLegalSettings()
    {
        $legalSetting = app(LegalSetting::class);

        $legalSetting->privacy_policy = "<p>&nbsp;This Privacy Policy explains how Sherpalaya collects, uses, and protects your personal information when you use our website and services. By using our website, you consent to the practices described herein.&nbsp;</p><p><strong>Information We Collect</strong></p><ol><li>Personal information such as name, email, phone number, and payment details when you book a service.</li><li>Usage data, including IP address, browser type, and website activity.</li><li>Cookies and tracking technologies to improve user experience.</li></ol><p><strong>How We Use Your Information</strong></p><ol><li>To process bookings and payments.</li><li>To improve our services and website functionality.</li><li>To communicate with users regarding bookings, promotions, and updates.</li><li>To comply with legal obligations.</li></ol><p><strong>Data Protection and Security</strong></p><ol><li>We implement security measures to protect user data.</li><li>We do not sell or share your personal information with third parties without your consent.</li><li>Your data is stored securely and accessed only by authorized personnel.</li></ol><p><strong>Cookies and Tracking Technologies</strong></p><ol><li>We use cookies to enhance user experience and analyze website traffic.</li><li>You can manage cookie preferences through your browser settings.</li></ol><p><strong>Third-Party Services</strong></p><ol><li>We may use third-party services for payment processing and analytics.</li><li>These providers have their own privacy policies governing data use.</li></ol><p><strong>User Rights</strong></p><ol><li>Users can request access, modification, or deletion of their personal data.</li><li>Users can opt-out of marketing communications at any time.</li></ol><p><strong>Policy Updates</strong></p><ol><li>We reserve the right to update this Privacy Policy as needed.</li><li>Users will be notified of any significant changes.</li></ol><p><strong>Contact Information</strong></p><ol><li>For any privacy-related concerns, contact us at support@sherpalaya.com.</li></ol>";
        $legalSetting->terms_and_condition = "<p>&nbsp;Welcome to Sherpalaya .Our Terms and Conditions govern your use of our website and services. By using our website, you agree to comply with these terms. If you do not agree, please refrain from using our services.&nbsp;</p><p><strong>General Terms</strong></p><ol><li>These Terms apply to all users of our website and services.&nbsp;</li><li>We reserve the right to modify these Terms at any time. Changes will be effective upon posting on our website.</li><li>Your continued use of our services constitutes acceptance of any modifications.</li></ol><p><strong>Booking and Payment</strong></p><ol><li>All bookings are subject to availability and confirmation.</li><li>Payment must be made as per the instructions provided during the booking process.</li><li>We accept payments through various methods, including credit cards, bank transfers, and digital wallets.</li><li>Any additional fees, such as transaction or service charges, may be applied.&nbsp;</li></ol><p><strong>Cancellation and Refund Policy</strong></p><ol><li>Cancellations must be requested in writing via email.</li><li>Refunds will be processed based on the cancellation policy of the specific service booked.</li><li>We are not responsible for refunds from third-party service providers.</li><li>No refunds will be issued for no-shows or last-minute cancellations.</li></ol><p><strong>Travel Documents and Requirements</strong></p><ol><li>Travelers are responsible for obtaining valid passports, visas, and other necessary travel documents.</li><li>We are not liable for any issues arising due to incorrect or missing documents.</li><li>Some destinations may require specific vaccinations or health certificates.&nbsp;</li></ol><p><strong>Liability and Responsibility</strong></p><ol><li>We act only as an intermediary between travelers and service providers (hotels, airlines, tour operators, etc.).</li><li>We are not responsible for delays, cancellations, or other issues caused by third parties.</li><li>Travelers assume all risks associated with travel, including but not limited to accidents, injuries, or loss of personal belongings.</li><li>We recommend purchasing travel insurance for protection against unforeseen circumstances.</li></ol><p><strong>User Conduct</strong></p><ol><li>Users must not use our website for unlawful activities.</li><li>Any fraudulent, abusive, or disruptive behavior will result in the termination of services.</li><li>We reserve the right to deny service to anyone at our discretion.</li></ol><p><strong>Privacy Policy</strong></p><ol><li>We respect your privacy and protect your personal information as outlined in our Privacy Policy.</li><li>By using our services, you consent to the collection and use of your data as described.</li></ol><p><strong>Force Majeure</strong></p><ol><li>We are not responsible for disruptions caused by unforeseen events, including but not limited to natural disasters, political unrest, pandemics, or government restrictions.</li></ol><p><strong>Governing Law and Dispute Resolution</strong></p><ol><li>These Terms are governed by the laws of Nepal.</li><li>Any disputes will be resolved through negotiations. If unresolved, they will be referred to Nepalese courts.</li></ol>";
        $legalSetting->cookie_policy = "<p>TBD</p>";

        $legalSetting->save();
    }

    public function seedAboutUsSettings()
    {
        $aboutUsSetting = app(AboutUsSetting::class);

        $aboutUsSetting->cover_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/aboutpage.jpg'))->id;
        $aboutUsSetting->content = "<p>We offer a wide range of services to ensure your journey in Nepal is seamless and unforgettable. From guided expeditions and trekking adventures to cultural tours, logistics, permits, and safety support, we handle every detail so you can focus on the adventure ahead.</p>";
        $aboutUsSetting->certificate_images = [
            CuratorSeederHelper::resolveFileData(public_path('/certificates/company-registration.jpg'))->id,
            CuratorSeederHelper::resolveFileData(public_path('/certificates/gharelu-udhyog.jpg'))->id,
            CuratorSeederHelper::resolveFileData(public_path('/certificates/pan-registration.jpg'))->id,
            CuratorSeederHelper::resolveFileData(public_path('/certificates/rastriya-bank-dollar.jpg'))->id,
            CuratorSeederHelper::resolveFileData(public_path('/certificates/valley-tourism.jpg'))->id,
        ];
        $aboutUsSetting->save();
    }
}
