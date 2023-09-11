<?php

namespace App\View\Components\Shop;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PopularProduct extends Component
{
    public $products;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->products = \App\Models\Product::latest()->take(4)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shop.popular-product', [
            'products' => $this->products,
        ]);
    }
}
