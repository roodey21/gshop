<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShopLayout extends Component
{
    public $setting;
    public $categories;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->setting = Setting::first();
        $this->categories = Category::with('products')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.shop.shop', [
            'web_setting' => $this->setting,
            'categories' => $this->categories
        ]);
    }
}
