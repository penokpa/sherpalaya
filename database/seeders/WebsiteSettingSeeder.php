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
                'title_en' => 'Expeditions',
                'title_fr' => 'Expéditions',
                'wait_time' => 1,
                'content_en' => 'Embark on the ultimate adventure with our expertly guided 8000ers, 7000ers, 6000ers and more expeditions',
                'content_fr' => 'Partez pour l\'aventure ultime avec nos expéditions expertes guidées de 8000m, 7000m, 6000m et plus',
                'image_id' => '',
                'images' => [
                    CuratorSeederHelper::resolveFileData(public_path('/photos/newexped.JPG'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/vhimalaya4.jpeg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/newexped2.JPG'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/newexped3.JPG'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/vhimalaya2.jpeg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/vhimalaya.jpeg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/newexped4.JPG'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/vhimalaya3.jpeg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/mountain9.jpg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/basecamp4.JPG'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/himalaya3.jpeg'))->id,
                ],
                'icon_id' => CuratorSeederHelper::resolveFileData(public_path('/icons/expedition.svg'))->id,
            ],
            [
                'id' => fake()->regexify('[A-Za-z]{10}'),
                'title_en' => 'Trek',
                'title_fr' => 'Randonnée',
                'wait_time' => 1,
                'content_en' => 'Discover the magic of Nepal’s breathtaking trails with our immersive treks all around the East to the West',
                'content_fr' => 'Découvrez la magie des sentiers à couper le souffle du Népal avec nos randonnées immersives de l\'Est à l\'Ouest',
                'image_id' => '',
                'images' => [
                    CuratorSeederHelper::resolveFileData(public_path('/photos/newtrek2.JPG'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/trekbanner.jpg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/vabcbasecamp.jpeg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/trek1.JPG'))->id,

                    CuratorSeederHelper::resolveFileData(public_path('/photos/vyak.jpeg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/bbbasecamp.jpeg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/treklanding.jpeg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/newtrek.JPG'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/newtrek4.JPG'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/newtrek3.JPG'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/trek2.JPG'))->id,
                ],
                'icon_id' => CuratorSeederHelper::resolveFileData(public_path('/icons/trek.svg'))->id,
            ],
            [
                'id' => fake()->regexify('[A-Za-z]{10}'),
                'title_en' => 'Activities',
                'title_fr' => 'Activités',
                'wait_time' => 1,
                'content_en' => 'Indulge and explore Nepali society and culture in the best way possible',
                'content_fr' => 'Découvrez et explorez la société et la culture népalaises de la meilleure façon possible',
                'image_id' => '',
                'images' => [
                    CuratorSeederHelper::resolveFileData(public_path('/photos/activity2.JPG'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/vtour.jpeg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/activity3.JPG'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/vtours.jpeg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/culture.jpg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/culture2.jpg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/vtour3.jpeg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/culture3.jpg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/vtour2.jpeg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/temple.jpg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/vtour4.jpeg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/activity.JPG'))->id,
                ],
                'icon_id' => CuratorSeederHelper::resolveFileData(public_path('/icons/culture.svg'))->id,
            ],
            [
                'id' => fake()->regexify('[A-Za-z]{10}'),
                'title_en' => 'Sherpalaya',
                'title_fr' => 'Sherpalaya',
                'wait_time' => 1,
                'content_en' => 'Explore with us RIGHT NOW!',
                'content_fr' => 'Explorez avec nous MAINTENANT !',
                'image_id' => '',
                'images' => [
                    CuratorSeederHelper::resolveFileData(public_path('/photos/himalaya.jpeg'))->id,
                    CuratorSeederHelper::resolveFileData(public_path('/photos/logo.png'))->id,
                ],
                'icon_id' => CuratorSeederHelper::resolveFileData(public_path('/icons/peak.svg'))->id,
            ],
        ];

        // Top-level variables changed to [key]_en and [key]_fr format
        $landingPageSetting->ask_for_animation_title_en = 'Immerse yourself';
        $landingPageSetting->ask_for_animation_title_fr = 'Plongez-vous';

        $landingPageSetting->ask_for_animation_content_en = 'Do you want to take part in a short visual animation related to Sherpalaya?';
        $landingPageSetting->ask_for_animation_content_fr = 'Souhaitez-vous participer à une courte animation visuelle liée à Sherpalaya ?';

        $landingPageSetting->ask_for_animation_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/qualitymount2.png'))->id;

        $landingPageSetting->ask_for_animation_positive_response_en = 'Ok';
        $landingPageSetting->ask_for_animation_positive_response_fr = 'D\'accord';

        $landingPageSetting->ask_for_animation_negative_response_en = 'Skip';
        $landingPageSetting->ask_for_animation_negative_response_fr = 'Passer';

        $landingPageSetting->animation_button_text_en = 'Proceed';
        $landingPageSetting->animation_button_text_fr = 'Continuer';

        $landingPageSetting->animation_button_icon_id = CuratorSeederHelper::resolveFileData(public_path('/icons/scroll-down.svg'))->id;

        $landingPageSetting->animation_sound_id = CuratorSeederHelper::resolveFileData(public_path('/audio/our-teamound.wav'))->id;

        $landingPageSetting->homepage_title_en = 'Explore Beyond Limits';
        $landingPageSetting->homepage_title_fr = 'Explorez au-delà des limites';

        $landingPageSetting->homepage_description_en = 'Welcome to Sherpalaya, a virtual world where you can explore the wonders of the Himalayas. Discover the beauty of the mountains, the culture of the Sherpas, and the history of the region. Join us on a journey of discovery and immerse yourself in the magic of the Himalayas.';
        $landingPageSetting->homepage_description_fr = 'Bienvenue à Sherpalaya, un monde virtuel où vous pouvez explorer les merveilles de l\'Himalaya. Découvrez la beauté des montagnes, la culture des Sherpas et l\'histoire de la région. Rejoignez-nous pour un voyage de découverte et plongez dans la magie de l\'Himalaya.';

        $landingPageSetting->expedition_activity_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/mountain1.jpg'))->id;
        $landingPageSetting->trek_activity_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/trekbanner.jpg'))->id;
        $landingPageSetting->tour_activity_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/culture.jpg'))->id;
        $landingPageSetting->peak_activity_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/bbbasecamp.jpeg'))->id;

        $landingPageSetting->expedition_activity_content_en = "Embark on the ultimate adventure with our expertly guided expeditions. Whether conquering the towering Himalayas or traversing remote landscapes, our seasoned team ensures a thrilling yet safe journey. Experience high-altitude challenges, breathtaking scenery, and a deep connection with nature like never before.";
        $landingPageSetting->expedition_activity_content_fr = "Partez pour l'aventure ultime avec nos expéditions expertes guidées. Que ce soit pour conquérir les imposantes montagnes de l'Himalaya ou traverser des paysages reculés, notre équipe expérimentée garantit un voyage passionnant mais sûr. Vivez des défis en haute altitude, des paysages à couper le souffle et une connexion profonde avec la nature comme jamais auparavant.";

        $landingPageSetting->trek_activity_content_en = "Discover the magic of Nepal’s breathtaking trails with our immersive treks. From the legendary Everest Base Camp to the serene Annapurna Circuit, we take you through diverse landscapes, rich cultures, and unforgettable moments. Let each step lead you to a new adventure!";
        $landingPageSetting->trek_activity_content_fr = "Découvrez la magie des sentiers à couper le souffle du Népal avec nos randonnées immersives. Du légendaire camp de base de l'Everest au circuit serein de l'Annapurna, nous vous emmenons à travers des paysages diversifiés, des cultures riches et des moments inoubliables. Laissez chaque pas vous conduire à une nouvelle aventure !";

        $landingPageSetting->tour_activity_content_en = "Unveil the wonders of Nepal with our expertly curated tours. Explore ancient heritage, vibrant cities, and stunning natural beauty with our knowledgeable guides. Whether cultural, spiritual, or scenic, every tour is crafted for an enriching and unforgettable experience.";
        $landingPageSetting->tour_activity_content_fr = "Découvrez les merveilles du Népal avec nos circuits soigneusement conçus. Explorez le patrimoine ancien, les villes vibrantes et la beauté naturelle à couper le souffle avec nos guides expérimentés. Qu'il s'agisse de culture, de spiritualité ou de paysages, chaque circuit est conçu pour une expérience enrichissante et inoubliable.";

        $landingPageSetting->peak_activity_content_en = "Reach new heights with our exhilarating peak climbing adventures. Designed for both seasoned climbers and ambitious beginners, we provide expert guidance, safety assurance, and unmatched Himalayan views. Conquer your dreams, one summit at a time!";
        $landingPageSetting->peak_activity_content_fr = "Atteignez de nouveaux sommets avec nos aventures palpitantes d'escalade de pics. Conçues pour les grimpeurs expérimentés et les débutants ambitieux, nous offrons un guide expert, une assurance sécurité et des vues inégalées sur l'Himalaya. Conquérir vos rêves, un sommet à la fois !";

        $landingPageSetting->expedition_activity_count = '50+';
        $landingPageSetting->trek_activity_count = '200+';
        $landingPageSetting->tour_activity_count = '1000+';
        $landingPageSetting->peak_activity_count = 'sherpalaya';

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
        $pageSetting->team_page_cover_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/activity2.JPG'))->id;

        $pageSetting->expedition_page_content_en = "Push your limits and embark on an extraordinary Himalayan expedition. Our expertly guided journeys take you to some of the highest and most challenging peaks on the planet. Experience raw adventure, breathtaking landscapes, and the triumph of reaching new heights with our experienced mountaineers and support teams.";
        $pageSetting->expedition_page_content_fr = "Repoussez vos limites et embarquez pour une expédition himalayenne extraordinaire. Nos voyages expertement guidés vous emmènent vers certains des sommets les plus hauts et les plus difficiles de la planète. Vivez une aventure brute, des paysages à couper le souffle et le triomphe d'atteindre de nouveaux sommets avec nos alpinistes expérimentés et nos équipes de soutien.";

        $pageSetting->expedition_page_title_up_en = "Conquer New Heights";
        $pageSetting->expedition_page_main_title_en = "Epic Expeditions";
        $pageSetting->expedition_page_title_down_en = "Guided by Experience, Inspired by Nature";

        $pageSetting->expedition_page_title_up_fr = "Conquérez de Nouveaux Sommets";
        $pageSetting->expedition_page_main_title_fr = "Expéditions Épiques";
        $pageSetting->expedition_page_title_down_fr = "Guidés par l’Expérience, Inspirés par la Nature";

        $pageSetting->trek_page_content_en = "Step into the heart of the Himalayas with our unforgettable trekking adventures. Walk through lush forests, rugged mountain trails, and culturally rich villages as you discover Nepal’s most iconic routes. Whether you seek a short scenic trek or an epic multi-day journey, we create experiences that inspire.";
        $pageSetting->trek_page_content_fr = "Plongez au cœur de l'Himalaya avec nos aventures de trekking inoubliables. Parcourez des forêts luxuriantes, des sentiers montagneux accidentés et des villages culturellement riches tout en découvrant les itinéraires les plus emblématiques du Népal. Que vous recherchiez une randonnée courte et pittoresque ou un voyage épique de plusieurs jours, nous créons des expériences qui inspirent.";

        $pageSetting->trek_page_title_up_en = "Unforgettable";
        $pageSetting->trek_page_main_title_en = "Trekking Adventure";
        $pageSetting->trek_page_title_down_en = "Every Step Counts";

        $pageSetting->trek_page_title_up_fr = "Inoubliable";
        $pageSetting->trek_page_main_title_fr = "Aventure de Randonnée";
        $pageSetting->trek_page_title_down_fr = "Chaque Pas Compte";

        $pageSetting->tour_page_content_en = "Experience Nepal beyond the mountains with our immersive tours. From exploring Kathmandu’s UNESCO-listed sites to witnessing the serene beauty of Pokhara and the wildlife of Chitwan, our tours blend history, nature, and culture into an unforgettable adventure tailored just for you.";
        $pageSetting->tour_page_content_fr = "Découvrez le Népal au-delà des montagnes avec nos circuits immersifs. De l'exploration des sites classés au patrimoine mondial de l'UNESCO à Katmandou à la découverte de la beauté sereine de Pokhara et de la faune de Chitwan, nos circuits mélangent histoire, nature et culture pour une aventure inoubliable conçue spécialement pour vous.";

        $pageSetting->tour_page_title_up_en = "Jaw Dropping";
        $pageSetting->tour_page_main_title_en = "Tours & Activities";
        $pageSetting->tour_page_title_down_en = "The Journey of a Lifetime";

        $pageSetting->tour_page_title_up_fr = "Époustouflant";
        $pageSetting->tour_page_main_title_fr = "Tours et Activités";
        $pageSetting->tour_page_title_down_fr = "Le Voyage d’une Vie";

        $pageSetting->team_page_content_title_en = "Journey with Experts";
        $pageSetting->team_page_content_title_fr = "Voyagez avec des Experts";
        $pageSetting->team_page_content_en = "Our team of travel experts is dedicated to making your journey seamless and unforgettable. With years of experience and a passion for exploration, we ensure every trip is planned to perfection. From breathtaking destinations to personalized itineraries, we’re here to guide you every step of the way.";
        $pageSetting->team_page_content_fr = "Notre équipe d’experts en voyage est dévouée à rendre votre périple fluide et inoubliable. Avec des années d’expérience et une passion pour l’exploration, nous veillons à ce que chaque voyage soit planifié à la perfection. Des destinations à couper le souffle aux itinéraires personnalisés, nous sommes là pour vous guider à chaque étape du chemin.";

        $pageSetting->team_page_title_up_en = "Meet Our Experts";
        $pageSetting->team_page_main_title_en = "Our Travel Specialists";
        $pageSetting->team_page_title_down_en = "The People Behind Your Journeys";

        $pageSetting->team_page_title_up_fr = "Rencontrez Nos Experts";
        $pageSetting->team_page_main_title_fr = "Nos Spécialistes du Voyage";
        $pageSetting->team_page_title_down_fr = "Les Personnes Derrière Vos Voyages";

        $pageSetting->save();
    }

    public function seedContactUsSettings()
    {
        $contactUsSetting = app(ContactUsSetting::class);

        $contactUsSetting->cover_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/satellite.jpg'))->id;
        $contactUsSetting->content_title_en = "Get In Touch";
        $contactUsSetting->content_title_fr = "Nous contacter";

        $contactUsSetting->content_en = "We’d love to hear from you! Whether you’re planning your next big adventure, have questions about our trips, or need expert guidance, our team is here to help. Reach out to us for personalized travel advice, booking inquiries, or any other assistance. Let’s make your Himalayan journey a reality—contact us today!";
        $contactUsSetting->content_fr = "Nous aimerions avoir de vos nouvelles ! Que vous planifiez votre prochaine grande aventure, ayez des questions sur nos voyages ou ayez besoin de conseils d'experts, notre équipe est là pour vous aider. Contactez-nous pour des conseils de voyage personnalisés, des demandes de réservation ou toute autre assistance. Faisons de votre voyage himalayen une réalité—contactez-nous dès aujourd'hui !";

        $contactUsSetting->title_up_fr = "Parlons Voyage !";
        $contactUsSetting->title_up_en = "Let’s Talk Travel!";
        $contactUsSetting->main_title_en = "Contact Us";
        $contactUsSetting->main_title_fr = "Contactez-nous";
        $contactUsSetting->title_down_en = "Travel Assistance, Just a Click Away";
        $contactUsSetting->title_down_fr = "Assistance voyage, à un clic de distance";

        $contactUsSetting->address_en = 'Bafal - 13, Kathmandu';
        $contactUsSetting->address_fr = 'Bafal - 13, Katmandou';

        $contactUsSetting->contact_en = '+977- 9801717177';
        $contactUsSetting->contact_fr = '+977- 9801717177';

        $contactUsSetting->working_hour_en = 'Sun-Thurs: 11-5 / Fri: 12-3 / Sat: Closed';
        $contactUsSetting->working_hour_fr = 'Dim-Jeu: 11-5 / Ven: 12-3 / Sam: Fermé';

        $contactUsSetting->save();
    }

    public function seedCompanySettings()
    {
        $companySetting = app(CompanySetting::class);

        $companySetting->company_logo_id = CuratorSeederHelper::resolveFileData(public_path('/photos/logo.png'))->id;

        $companySetting->company_name_en = "Sherpalaya Pvt. Ltd.";
        $companySetting->company_name_fr = "Sherpalaya Pvt. Ltd.";

        $companySetting->company_address_en = "Bafal - 13, Kathmandu";
        $companySetting->company_address_fr = "Bafal - 13, Kathmandu";

        $companySetting->company_email_en = "tashi.palzor.sherpa@gmail.com";
        $companySetting->company_email_fr = "tashi.palzor.sherpa@gmail.com";

        $companySetting->company_contact_number_en = "+977 9801717177";
        $companySetting->company_contact_number_fr = "+977 9801717177";

        $companySetting->facebook_url = "https://www.facebook.com/sherpalaya.trek.1/";
        $companySetting->instagram_url = "https://www.instagram.com/sherpalaya/";
        $companySetting->youtube_url = "https://www.youtube.com/@sherpalaya";
        $companySetting->tiktok_url = "https://www.tiktok.com/@sherpalaya";

        $companySetting->save();
    }

    public function seedLegalSettings()
    {
        $legalSetting = app(LegalSetting::class);

        $legalSetting->privacy_policy_en = "<p>&nbsp;This Privacy Policy explains how Sherpalaya collects, uses, and protects your personal information when you use our website and services. By using our website, you consent to the practices described herein.&nbsp;</p><p><strong>Information We Collect</strong></p><ol><li>Personal information such as name, email, phone number, and payment details when you book a service.</li><li>Usage data, including IP address, browser type, and website activity.</li><li>Cookies and tracking technologies to improve user experience.</li></ol><p><strong>How We Use Your Information</strong></p><ol><li>To process bookings and payments.</li><li>To improve our services and website functionality.</li><li>To communicate with users regarding bookings, promotions, and updates.</li><li>To comply with legal obligations.</li></ol><p><strong>Data Protection and Security</strong></p><ol><li>We implement security measures to protect user data.</li><li>We do not sell or share your personal information with third parties without your consent.</li><li>Your data is stored securely and accessed only by authorized personnel.</li></ol><p><strong>Cookies and Tracking Technologies</strong></p><ol><li>We use cookies to enhance user experience and analyze website traffic.</li><li>You can manage cookie preferences through your browser settings.</li></ol><p><strong>Third-Party Services</strong></p><ol><li>We may use third-party services for payment processing and analytics.</li><li>These providers have their own privacy policies governing data use.</li></ol><p><strong>User Rights</strong></p><ol><li>Users can request access, modification, or deletion of their personal data.</li><li>Users can opt-out of marketing communications at any time.</li></ol><p><strong>Policy Updates</strong></p><ol><li>We reserve the right to update this Privacy Policy as needed.</li><li>Users will be notified of any significant changes.</li></ol><p><strong>Contact Information</strong></p><ol><li>For any privacy-related concerns, contact us at support@sherpalaya.com.</li></ol>";
        $legalSetting->privacy_policy_fr = "<p>&nbsp;Cette politique de confidentialité explique comment Sherpalaya collecte, utilise et protège vos informations personnelles lorsque vous utilisez notre site web et nos services. En utilisant notre site web, vous consentez aux pratiques décrites ici.&nbsp;</p><p><strong>Informations que nous collectons</strong></p><ol><li>Informations personnelles telles que le nom, l'adresse e-mail, le numéro de téléphone et les détails de paiement lorsque vous réservez un service.</li><li>Données d'utilisation, y compris l'adresse IP, le type de navigateur et l'activité du site web.</li><li>Cookies et technologies de suivi pour améliorer l'expérience utilisateur.</li></ol><p><strong>Comment nous utilisons vos informations</strong></p><ol><li>Pour traiter les réservations et les paiements.</li><li>Pour améliorer nos services et la fonctionnalité du site web.</li><li>Pour communiquer avec les utilisateurs concernant les réservations, les promotions et les mises à jour.</li><li>Pour se conformer aux obligations légales.</li></ol><p><strong>Protection des données et sécurité</strong></p><ol><li>Nous mettons en œuvre des mesures de sécurité pour protéger les données des utilisateurs.</li><li>Nous ne vendons ni ne partageons vos informations personnelles avec des tiers sans votre consentement.</li><li>Vos données sont stockées en toute sécurité et ne sont accessibles que par le personnel autorisé.</li></ol><p><strong>Cookies et technologies de suivi</strong></p><ol><li>Nous utilisons des cookies pour améliorer l'expérience utilisateur et analyser le trafic du site web.</li><li>Vous pouvez gérer les préférences de cookies via les paramètres de votre navigateur.</li></ol><p><strong>Services tiers</strong></p><ol><li>Nous pouvons utiliser des services tiers pour le traitement des paiements et l'analyse.</li><li>Ces fournisseurs ont leurs propres politiques de confidentialité régissant l'utilisation des données.</li></ol><p><strong>Droits des utilisateurs</strong></p><ol><li>Les utilisateurs peuvent demander l'accès, la modification ou la suppression de leurs données personnelles.</li><li>Les utilisateurs peuvent se désinscrire des communications marketing à tout moment.</li></ol><p><strong>Mises à jour de la politique</strong></p><ol><li>Nous nous réservons le droit de mettre à jour cette politique de confidentialité si nécessaire.</li><li>Les utilisateurs seront informés de tout changement important.</li></ol><p><strong>Informations de contact</strong></p><ol><li>Pour toute question liée à la confidentialité, contactez-nous à support@sherpalaya.com.</li></ol>";

        $legalSetting->terms_and_condition_en = "<p>&nbsp;Welcome to Sherpalaya .Our Terms and Conditions govern your use of our website and services. By using our website, you agree to comply with these terms. If you do not agree, please refrain from using our services.&nbsp;</p><p><strong>General Terms</strong></p><ol><li>These Terms apply to all users of our website and services.&nbsp;</li><li>We reserve the right to modify these Terms at any time. Changes will be effective upon posting on our website.</li><li>Your continued use of our services constitutes acceptance of any modifications.</li></ol><p><strong>Booking and Payment</strong></p><ol><li>All bookings are subject to availability and confirmation.</li><li>Payment must be made as per the instructions provided during the booking process.</li><li>We accept payments through various methods, including credit cards, bank transfers, and digital wallets.</li><li>Any additional fees, such as transaction or service charges, may be applied.&nbsp;</li></ol><p><strong>Cancellation and Refund Policy</strong></p><ol><li>Cancellations must be requested in writing via email.</li><li>Refunds will be processed based on the cancellation policy of the specific service booked.</li><li>We are not responsible for refunds from third-party service providers.</li><li>No refunds will be issued for no-shows or last-minute cancellations.</li></ol><p><strong>Travel Documents and Requirements</strong></p><ol><li>Travelers are responsible for obtaining valid passports, visas, and other necessary travel documents.</li><li>We are not liable for any issues arising due to incorrect or missing documents.</li><li>Some destinations may require specific vaccinations or health certificates.&nbsp;</li></ol><p><strong>Liability and Responsibility</strong></p><ol><li>We act only as an intermediary between travelers and service providers (hotels, airlines, tour operators, etc.).</li><li>We are not responsible for delays, cancellations, or other issues caused by third parties.</li><li>Travelers assume all risks associated with travel, including but not limited to accidents, injuries, or loss of personal belongings.</li><li>We recommend purchasing travel insurance for protection against unforeseen circumstances.</li></ol><p><strong>User Conduct</strong></p><ol><li>Users must not use our website for unlawful activities.</li><li>Any fraudulent, abusive, or disruptive behavior will result in the termination of services.</li><li>We reserve the right to deny service to anyone at our discretion.</li></ol><p><strong>Privacy Policy</strong></p><ol><li>We respect your privacy and protect your personal information as outlined in our Privacy Policy.</li><li>By using our services, you consent to the collection and use of your data as described.</li></ol><p><strong>Force Majeure</strong></p><ol><li>We are not responsible for disruptions caused by unforeseen events, including but not limited to natural disasters, political unrest, pandemics, or government restrictions.</li></ol><p><strong>Governing Law and Dispute Resolution</strong></p><ol><li>These Terms are governed by the laws of Nepal.</li><li>Any disputes will be resolved through negotiations. If unresolved, they will be referred to Nepalese courts.</li></ol>";
        $legalSetting->terms_and_condition_fr = "<p>&nbsp;Bienvenue sur Sherpalaya. Nos conditions générales régissent votre utilisation de notre site web et de nos services. En utilisant notre site web, vous acceptez de respecter ces conditions. Si vous n'êtes pas d'accord, veuillez vous abstenir d'utiliser nos services.&nbsp;</p><p><strong>Conditions générales</strong></p><ol><li>Ces conditions s'appliquent à tous les utilisateurs de notre site web et de nos services.&nbsp;</li><li>Nous nous réservons le droit de modifier ces conditions à tout moment. Les modifications prendront effet dès leur publication sur notre site web.</li><li>Votre utilisation continue de nos services constitue une acceptation de toute modification.</li></ol><p><strong>Réservation et paiement</strong></p><ol><li>Toutes les réservations sont soumises à disponibilité et confirmation.</li><li>Le paiement doit être effectué conformément aux instructions fournies lors du processus de réservation.</li><li>Nous acceptons les paiements par diverses méthodes, y compris les cartes de crédit, les virements bancaires et les portefeuilles numériques.</li><li>Des frais supplémentaires, tels que des frais de transaction ou de service, peuvent être appliqués.&nbsp;</li></ol><p><strong>Politique d'annulation et de remboursement</strong></p><ol><li>Les annulations doivent être demandées par écrit par e-mail.</li><li>Les remboursements seront traités conformément à la politique d'annulation du service spécifique réservé.</li><li>Nous ne sommes pas responsables des remboursements des fournisseurs de services tiers.</li><li>Aucun remboursement ne sera effectué pour les non-présentations ou les annulations de dernière minute.</li></ol><p><strong>Documents de voyage et exigences</strong></p><ol><li>Les voyageurs sont responsables de l'obtention de passeports valides, de visas et d'autres documents de voyage nécessaires.</li><li>Nous ne sommes pas responsables des problèmes résultant de documents incorrects ou manquants.</li><li>Certaines destinations peuvent nécessiter des vaccinations spécifiques ou des certificats de santé.&nbsp;</li></ol><p><strong>Responsabilité et responsabilité</strong></p><ol><li>Nous agissons uniquement en tant qu'intermédiaire entre les voyageurs et les fournisseurs de services (hôtels, compagnies aériennes, tour-opérateurs, etc.).</li><li>Nous ne sommes pas responsables des retards, annulations ou autres problèmes causés par des tiers.</li><li>Les voyageurs assument tous les risques liés au voyage, y compris mais sans s'y limiter, les accidents, les blessures ou la perte d'effets personnels.</li><li>Nous recommandons de souscrire une assurance voyage pour se protéger contre les circonstances imprévues.</li></ol><p><strong>Conduite de l'utilisateur</strong></p><ol><li>Les utilisateurs ne doivent pas utiliser notre site web pour des activités illégales.</li><li>Tout comportement frauduleux, abusif ou perturbateur entraînera la résiliation des services.</li><li>Nous nous réservons le droit de refuser le service à quiconque à notre discrétion.</li></ol><p><strong>Politique de confidentialité</strong></p><ol><li>Nous respectons votre vie privée et protégeons vos informations personnelles comme décrit dans notre politique de confidentialité.</li><li>En utilisant nos services, vous consentez à la collecte et à l'utilisation de vos données comme décrit.</li></ol><p><strong>Force majeure</strong></p><ol><li>Nous ne sommes pas responsables des perturbations causées par des événements imprévus, y compris mais sans s'y limiter, les catastrophes naturelles, les troubles politiques, les pandémies ou les restrictions gouvernementales.</li></ol><p><strong>Loi applicable et résolution des litiges</strong></p><ol><li>Ces conditions sont régies par les lois du Népal.</li><li>Tout litige sera résolu par des négociations. En cas de non-résolution, il sera renvoyé devant les tribunaux népalais.</li></ol>";

        $legalSetting->cookie_policy_en = "<p>TBD</p>";
        $legalSetting->cookie_policy_fr = "<p>À déterminer</p>";

        $legalSetting->save();
    }

    public function seedAboutUsSettings()
    {
        $aboutUsSetting = app(AboutUsSetting::class);

        $aboutUsSetting->cover_image_id = CuratorSeederHelper::resolveFileData(public_path('/photos/aboutpage.jpg'))->id;

        $aboutUsSetting->content_en = "We offer a wide range of services to ensure your journey in Nepal is seamless and unforgettable. From guided expeditions and trekking adventures to cultural tours, logistics, permits, and safety support, we handle every detail so you can focus on the adventure ahead.";
        $aboutUsSetting->content_fr = "Nous offrons une large gamme de services pour garantir que votre voyage au Népal soit fluide et inoubliable. Des expéditions guidées et des aventures de trekking aux circuits culturels, en passant par la logistique, les permis et le soutien à la sécurité, nous gérons chaque détail pour que vous puissiez vous concentrer sur l'aventure qui vous attend.";

        $aboutUsSetting->content_title_en = "Our Passion, Your Adventure";
        $aboutUsSetting->content_title_fr = "Notre Passion, Votre Aventure";

        $aboutUsSetting->title_up_fr = "Embarquez pour des voyages inoubliables";
        $aboutUsSetting->title_up_en = "Embark on Unforgettable Journeys";
        $aboutUsSetting->main_title_en = "About Sherpalaya";
        $aboutUsSetting->main_title_fr = "À propos de Sherpalaya";
        $aboutUsSetting->title_down_en = "Crafting Experiences, Creating Memories";
        $aboutUsSetting->title_down_fr = "Façonner des expériences, créer des souvenirs";
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
