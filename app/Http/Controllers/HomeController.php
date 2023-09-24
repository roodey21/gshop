<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Province;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $lastReviews = ProductReview::latest()->take(4)->get();
        $products = Product::latest()->paginate(8);
        return view('shop.index', compact('setting','products', 'lastReviews'));
    }

    public function cekOngkir()
    {
        $provinces = Province::all();
        return view('shop.cek-ongkir', compact('provinces'));
    }
}
