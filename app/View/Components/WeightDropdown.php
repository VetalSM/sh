<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\Component;

class WeightDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.weight-dropdown', [
            'products' => Product::all(),
            'currentCategory' => Product::firstWhere('slug', request('product'))
        ]);
    }
}
