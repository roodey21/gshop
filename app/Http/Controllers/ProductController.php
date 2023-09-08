<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();
        $product = Product::create($data);
        if(!isset($data['status'])) {
            $product->update(['status' => 0]);
        }
        foreach($request->images as $image) {
            $product->addMedia($image)->toMediaCollection('product-images');
        }
        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);
        if(!isset($data['status'])) {
            $product->update(['status' => 0]);
        }
        foreach($request->images as $image) {
            $product->addMedia($image)->toMediaCollection('product-images');
        }
        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil diupdate');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil dihapus');
    }
}
