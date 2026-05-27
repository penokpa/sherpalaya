<?php

namespace Database\Seeders;

use App\Enums\CategoryType;
use App\Models\Category;
use App\Models\Expedition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Restructure expedition categories to a clean altitude-band layout, matching
 * Sherpalaya's positioning (Nepal-focused, Everest flagship).
 *
 * Final categories:
 *   1. Everest Expeditions  — Everest South + North + future variants
 *   2. 8000ers              — other 8000m peaks (K2, Lhotse, Manaslu, etc.)
 *   3. 7000ers              — Pumori, Baruntse
 *   4. 6000ers              — Ama Dablam, Mera, Island, Lobuche
 *
 * Removed: 7 Summits (continental peaks — not our scope), Luxury (handled
 * via service tiers on Everest/Manaslu detail pages), Others (empty).
 *
 * Idempotent.
 */
class ExpeditionCategoryRestructureSeeder extends Seeder
{
    public function run(): void
    {
        $this->ensureCategories();
        $this->reassignEverestVariants();
        $this->deleteUnusedCategories();
        $this->summarize();
    }

    private function ensureCategories(): void
    {
        $catalog = [
            // [old name, new name, slug, sort_order, description]
            ['8000+', '8000ers', '8000ers', 2,
                'The fourteen highest mountains on Earth — minus the Everest variants, which sit in their own section. Manaslu, Annapurna I, Dhaulagiri, Cho-Oyu, Lhotse, Makalu, Kanchenjunga, K2. Each one a multi-month commitment with full Sherpa support.'],
            ['7000+', '7000ers', '7000ers', 3,
                'Major Nepali peaks under the 8000m threshold. Pumori and Baruntse — long enough to feel like a real expedition, technical enough to demand prior altitude experience. The right step before the 8000m giants.'],
            ['6000+', '6000ers', '6000ers', 4,
                'Climbing peaks for trekkers ready to put on crampons. Ama Dablam, Mera, Island, Lobuche. Real summits with rope work and basic mountaineering skill, but accessible to fit trekkers without prior climbing experience.'],
        ];

        foreach ($catalog as [$oldName, $newName, $slug, $sortOrder, $description]) {
            $cat = Category::query()
                ->where('type', CategoryType::EXPEDITION)
                ->where(function ($q) use ($oldName, $newName) {
                    $q->whereJsonContains('name->en', $oldName)
                      ->orWhereJsonContains('name->en', $newName);
                })
                ->first();

            if (! $cat) {
                $cat = new Category(['type' => CategoryType::EXPEDITION]);
            }
            $cat->setTranslation('name', 'en', $newName);
            $cat->setTranslation('description', 'en', $description);
            $cat->slug = $slug;
            $cat->sort_order = $sortOrder;
            $cat->save();
        }

        // Add new "Everest Expeditions" category — flagship
        $everest = Category::query()
            ->where('type', CategoryType::EXPEDITION)
            ->whereJsonContains('name->en', 'Everest Expeditions')
            ->first();
        if (! $everest) {
            $everest = new Category(['type' => CategoryType::EXPEDITION]);
        }
        $everest->setTranslation('name', 'en', 'Everest Expeditions');
        $everest->setTranslation('description', 'en',
            'Sherpalaya was founded by an Everest summiteer. Four generations of our family have guided in the Khumbu. This is the mountain we know best — climbed in four service tiers from Classic to VVIP, all run by our own Sherpa team.');
        $everest->slug = 'everest-expeditions';
        $everest->sort_order = 1;
        $everest->save();

        $this->command->info('Categories: ensured 4 (Everest Expeditions · 8000ers · 7000ers · 6000ers)');
    }

    private function reassignEverestVariants(): void
    {
        $everestCat = Category::query()
            ->where('type', CategoryType::EXPEDITION)
            ->where('slug', 'everest-expeditions')
            ->first();

        if (! $everestCat) {
            return;
        }

        // Anything with "Everest" in the title goes to the Everest Expeditions
        // category (covers Mt. Everest South/North + future variants).
        // Exception: Lhotse stays in 8000ers (it's a separate mountain even
        // though it shares Everest's massif).
        $count = 0;
        foreach (Expedition::query()->get() as $exp) {
            $title = trim((string) $exp->getTranslation('title', 'en', false));
            if (stripos($title, 'everest') !== false && stripos($title, 'lhotse') === false) {
                if ((int) $exp->category_id !== (int) $everestCat->id) {
                    $exp->category_id = $everestCat->id;
                    $exp->save();
                    $count++;
                }
            }
        }
        $this->command->info("Everest variants reassigned: {$count}");
    }

    private function deleteUnusedCategories(): void
    {
        $names = ['Seven Summits', 'Others', 'Luxury'];
        $deleted = 0;
        foreach ($names as $name) {
            $cats = Category::query()
                ->where('type', CategoryType::EXPEDITION)
                ->whereJsonContains('name->en', $name)
                ->get();
            foreach ($cats as $cat) {
                // Re-home any orphans to 8000ers as a safe fallback (shouldn't
                // happen but defensive).
                $fallback = Category::query()
                    ->where('type', CategoryType::EXPEDITION)
                    ->where('slug', '8000ers')
                    ->first();
                if ($fallback) {
                    Expedition::where('category_id', $cat->id)->update(['category_id' => $fallback->id]);
                }
                $cat->delete();
                $deleted++;
            }
        }
        $this->command->info("Unused categories deleted: {$deleted}");
    }

    private function summarize(): void
    {
        $this->command->info('');
        $this->command->info('Final expedition categories:');
        foreach (Category::query()->where('type', CategoryType::EXPEDITION)->orderBy('sort_order')->get() as $cat) {
            $count = Expedition::where('category_id', $cat->id)->whereNotNull('published_at')->count();
            $this->command->info('  ' . str_pad($cat->getTranslation('name', 'en', false), 22) . ' ' . $count . ' published');
        }
    }
}
