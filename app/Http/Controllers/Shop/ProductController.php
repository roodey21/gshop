<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::when(request('category'), function ($query) {
            $query->where('category_id', request('category'));
        })->when(request('search'), function($query){
            $query->where('name', 'like', '%' . request('search') . '%');
        })->latest()->paginate(10);
        $categories = Category::isParent()->get();
        return view('shop.product.index', compact('products', 'categories'));
    }

    public function show(Product $product) {
        return view('shop.product.show', compact('product'));
    }
}
