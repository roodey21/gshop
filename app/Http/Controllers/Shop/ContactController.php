<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //

    public function index()
    {
        $setting = Setting::first();
        return view('shop.contact', compact('setting'));
    }
}
