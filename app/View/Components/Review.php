<?php


namespace App\View\Components;

use App\Models\Review as ReviewModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Review extends Component
{
    public Collection $allReviews;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->allReviews = ReviewModel::where('display_in_home_page', true)
            ->limit(5)
            ->get([
                'id',
                'name',
                'title',
                'description'
            ]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.review');
    }
}
