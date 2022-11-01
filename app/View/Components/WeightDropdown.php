<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Post;
use Illuminate\View\Component;

class WeightDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.weight-dropdown', [
            'posts' => Post::all(),
            'currentCategory' => Post::firstWhere('slug', request('post'))
        ]);
    }
}
