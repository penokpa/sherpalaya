<?php

namespace App\View\Components\Partials;

use App\Enums\CategoryType;
use App\Models\Category;
use App\Models\Region;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $navTours;
    public $navTourCategories;
    public $navTreks;
    public $navExpeditions;
    public $navRecentPosts;

    public function __construct(
        public ?string $query = null,
        public ?string $type = null,
    ) {

        $this->navTours = Category::with([
            'tours' => fn ($q) => $q->published(),
        ])->where('type', CategoryType::TOUR)
            ->get();

        // Tour categories for the Activities dropdown — only ones with content
        $this->navTourCategories = Category::with([
            'tours' => fn ($q) => $q->published(),
        ])->where('type', CategoryType::TOUR)
            ->get()
            ->filter(fn ($c) => $c->tours->isNotEmpty())
            ->values();

        // Recent published posts for the Journal dropdown
        $this->navRecentPosts = \App\Models\Post::query()
            ->published()
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get();

        // Treks grouped by Region. Eager-load coverImage on both the region
        // itself and its treks so the nav mega-menu can show thumbnails.
        $this->navTreks = Region::query()
            ->with([
                'coverImage',
                'treks' => fn ($q) => $q->published()->with('coverImage'),
            ])
            ->get()
            ->filter(fn ($r) => $r->treks->isNotEmpty())
            ->sortBy(fn ($r) => $this->regionSortKey($r->name))
            ->values()
            ->map(fn ($r) => (object) [
                'id'            => $r->id,
                'name'          => $r->name,
                'slug'          => $r->slug,
                'description'   => $r->description,
                'treks'         => $r->treks,
                'thumbnail_url' => optional($r->coverImage)->url
                    ?? optional($r->treks->first()?->coverImage)->url
                    ?? asset('photos/basecamp.JPG'),
            ]);

        // Expeditions categories with thumbnails for the mega-menu.
        $this->navExpeditions = Category::query()
            ->with([
                'coverImage',
                'expeditions' => fn ($q) => $q->published()->with('coverImage'),
            ])
            ->where('type', CategoryType::EXPEDITION)
            ->orderBy('sort_order')
            ->get()
            ->filter(fn ($c) => $c->expeditions->isNotEmpty())
            ->values()
            ->map(function ($c) {
                $c->thumbnail_url = optional($c->coverImage)->url
                    ?? optional($c->expeditions->first()?->coverImage)->url
                    ?? asset('photos/trek1.JPG');
                return $c;
            });
    }

    private function regionSortKey(string $name): string
    {
        $order = [
            'Everest', 'Annapurna', 'Mustang', 'Langtang, Gosainkunda',
            'Manaslu', 'Kanchenjunga', 'Dolpo', 'Rolwaling', 'Dhaulagiri',
            'Makalu', 'Far West Nepal',
        ];
        $idx = array_search($name, $order, true);
        return $idx !== false ? sprintf('%02d', $idx) : 'z_' . $name;
    }



    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.navbar');
    }
}
