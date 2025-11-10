<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'question' => [
                'en' => 'What is the problem?',
                'fr' => 'Quel est le problème ?',
            ],
            'answer' => [
                'en' => 'Question is the solution, Answer is the key.',
                'fr' => 'La question est la solution, la réponse est la clé.',
            ],
        ]);

        Faq::create([
            'question' => [
                'en' => 'What is the difference between trekking and peak climbing?',
                'fr' => 'Quelle est la différence entre le trekking et l\'escalade de sommet ?',
            ],
            'answer' => [
                'en' => 'Trekking involves long-distance walking, often on trails, through varied terrains, while peak climbing is the act of ascending to the summit of a mountain, which may require technical climbing skills and equipment.',
                'fr' => 'Le trekking consiste en une marche de longue distance, souvent sur des sentiers, à travers des terrains variés, tandis que l\'escalade de sommet est l\'ascension d\'une montagne, ce qui peut nécessiter des compétences techniques et du matériel d\'escalade.',
            ],
        ]);

        Faq::create([
            'question' => [
                'en' => 'What equipment do I need for a high-altitude trek?',
                'fr' => 'Quel équipement est nécessaire pour un trek en haute altitude ?',
            ],
            'answer' => [
                'en' => 'For high-altitude treks, you will need sturdy hiking boots, layered clothing for varying temperatures, a sleeping bag, a backpack, trekking poles, a headlamp, and other essentials like a first-aid kit, water purification tablets, and high-energy snacks.',
                'fr' => 'Pour un trek en haute altitude, vous aurez besoin de chaussures de randonnée robustes, de vêtements en couches pour les variations de température, d\'un sac de couchage, d\'un sac à dos, de bâtons de trekking, d\'une lampe frontale et d\'autres éléments essentiels comme une trousse de premiers secours, des pastilles de purification d\'eau et des collations énergétiques.',
            ],
        ]);

        Faq::create([
            'question' => [
                'en' => 'How do I prepare for an expedition?',
                'fr' => 'Comment se préparer pour une expédition ?',
            ],
            'answer' => [
                'en' => 'Preparation for an expedition involves physical training, acclimatization to high altitudes, researching the route, packing the right gear, and ensuring you have the necessary permits and travel insurance.',
                'fr' => 'La préparation d\'une expédition comprend un entraînement physique, une acclimatation aux hautes altitudes, une recherche sur l\'itinéraire, l\'emballage du matériel approprié et l\'obtention des permis et de l\'assurance voyage nécessaires.',
            ],
        ]);

        Faq::create([
            'question' => [
                'en' => 'What are the risks of high-altitude trekking?',
                'fr' => 'Quels sont les risques du trekking en haute altitude ?',
            ],
            'answer' => [
                'en' => 'Risks include altitude sickness, hypothermia, dehydration, and injuries from falls or avalanches. Proper preparation, acclimatization, and following safety guidelines can mitigate these risks.',
                'fr' => 'Les risques incluent le mal aigu des montagnes, l\'hypothermie, la déshydratation et les blessures dues aux chutes ou aux avalanches. Une bonne préparation, une acclimatation adéquate et le respect des consignes de sécurité peuvent réduire ces risques.',
            ],
        ]);

        Faq::create([
            'question' => [
                'en' => 'Do I need a guide for trekking or peak climbing?',
                'fr' => 'Ai-je besoin d\'un guide pour le trekking ou l\'escalade de sommet ?',
            ],
            'answer' => [
                'en' => 'While some treks can be done independently, having a guide is highly recommended for peak climbing and challenging treks. Guides provide valuable local knowledge, ensure safety, and help with navigation and logistics.',
                'fr' => 'Bien que certains treks puissent être effectués en autonomie, il est fortement recommandé d\'avoir un guide pour l\'escalade de sommet et les treks difficiles. Les guides apportent des connaissances locales précieuses, garantissent la sécurité et aident à la navigation et à la logistique.',
            ],
        ]);

    }
}
