<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $products = Product::latest()->paginate(8);
        return view('shop.index', compact('setting','products'));
    }
}
