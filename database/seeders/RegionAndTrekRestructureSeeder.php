<?php

namespace Database\Seeders;

use App\Models\Region;
use App\Models\Trek;
use Illuminate\Database\Seeder;

/**
 * One-off restructure to align Sherpalaya's trek lineup with HWW's region
 * structure and naming.
 *
 * Idempotent: safe to re-run. Operates by English title; preserves French
 * translations and all related records (itineraries, images, inquiries).
 */
class RegionAndTrekRestructureSeeder extends Seeder
{
    public function run(): void
    {
        $this->ensureRegions();
        $this->renameRegions();
        $this->renameTreks();
        $this->reassignRegions();
        $this->draftDuplicates();
        $this->summarize();
    }

    /**
     * Rename existing regions to match HWW naming exactly.
     */
    private function renameRegions(): void
    {
        $renames = [
            'Langtang' => 'Langtang, Gosainkunda',
        ];

        $renamed = 0;
        foreach ($renames as $old => $new) {
            $region = Region::query()->where('name', $old)->first();
            if ($region) {
                $region->name = $new;
                $region->save();
                $renamed++;
            }
        }

        $this->command->info("Regions renamed: {$renamed}");
    }

    /**
     * Regions to ensure exist (matches HWW's 11 trekking regions).
     */
    private function ensureRegions(): void
    {
        $regions = [
            'Manaslu',
            'Dolpo',
            'Mustang',
            'Kanchenjunga',
            'Makalu',
            'Rolwaling',
            'Dhaulagiri',
            'Far West Nepal',
        ];

        $created = 0;
        foreach ($regions as $name) {
            $existing = Region::query()->where('name', $name)->first();
            if (! $existing) {
                Region::create(['name' => $name]);
                $created++;
            }
        }

        $this->command->info("Regions: {$created} created (existing left as-is)");
    }

    /**
     * Rename treks (English title only — French preserved).
     *
     * old title => new title
     */
    private function renameTreks(): void
    {
        $renames = [
            'Kanchanjunga Circuit Trek'  => 'Kanchenjunga Circuit Trek',
            'Gokyo Valley Trek'          => 'Gokyo Lake Trek',
            'Everest Panorama Trek'      => 'Everest View Panorama Trek',
            'Upper Mustang Trek'         => 'Upper Mustang Classic Trek',
            'Ghorepani Poonhill Trek'    => 'Poon Hill Ghorepani Trek',
        ];

        $renamed = 0;
        foreach ($renames as $oldTitle => $newTitle) {
            $trek = $this->findTrekByTitle($oldTitle);
            if (! $trek) {
                continue;
            }
            $trek->setTranslation('title', 'en', $newTitle);
            $trek->save();
            $renamed++;
        }

        $this->command->info("Renamed: {$renamed} treks");
    }

    /**
     * Reassign treks to the correct region.
     *
     * trek title => region name
     */
    private function reassignRegions(): void
    {
        $mappings = [
            'Manaslu Circuit Trek'                 => 'Manaslu',
            'Tsum Valley Trek'                     => 'Manaslu',
            'Upper Mustang Classic Trek'           => 'Mustang',
            'Kanchenjunga Circuit Trek'            => 'Kanchenjunga',
            'Annapurna Dhaulagiri Trek'            => 'Dhaulagiri',
            'Dhampus / Sarangkot / Chitwan Pack'   => 'Annapurna',
        ];

        $reassigned = 0;
        foreach ($mappings as $trekTitle => $regionName) {
            $trek = $this->findTrekByTitle($trekTitle);
            $region = Region::query()->where('name', $regionName)->first();
            if (! $trek || ! $region) {
                continue;
            }
            if ((int) $trek->region_id !== (int) $region->id) {
                $trek->region_id = $region->id;
                $trek->save();
                $reassigned++;
            }
        }

        $this->command->info("Reassigned: {$reassigned} treks to new regions");
    }

    /**
     * Move duplicates / vague entries to draft (published_at = null).
     * Nothing deleted — data preserved.
     */
    private function draftDuplicates(): void
    {
        $duplicates = [
            'Annapurna Sanctuary Trek',  // same as ABC
            'Annapurna Excursion',       // vague generic
            'Renjo La Pass Trek',        // covered by Three Passes
        ];

        $drafted = 0;
        foreach ($duplicates as $title) {
            $trek = $this->findTrekByTitle($title);
            if (! $trek) {
                continue;
            }
            if ($trek->published_at !== null) {
                $trek->published_at = null;
                $trek->save();
                $drafted++;
            }
        }

        $this->command->info("Drafted (hidden from public): {$drafted} duplicates");
    }

    /**
     * Look up a trek by its English title, with trimmed/case-insensitive match.
     */
    private function findTrekByTitle(string $title): ?Trek
    {
        $needle = mb_strtolower(trim($title));
        foreach (Trek::query()->get() as $trek) {
            $candidate = mb_strtolower(trim((string) $trek->getTranslation('title', 'en', false)));
            if ($candidate === $needle) {
                return $trek;
            }
        }
        return null;
    }

    /**
     * Print final state so we can eyeball the result.
     */
    private function summarize(): void
    {
        $this->command->info('');
        $this->command->info('=== Final state ===');
        foreach (Region::orderBy('name')->get() as $region) {
            $treks = Trek::query()->where('region_id', $region->id)->get();
            if ($treks->isEmpty()) {
                continue;
            }
            $this->command->info("[ {$region->name} ]");
            foreach ($treks as $trek) {
                $status = $trek->published_at ? 'pub' : 'draft';
                $title = trim((string) $trek->getTranslation('title', 'en', false));
                $this->command->info("  - {$title} ({$status})");
            }
        }
    }
}
