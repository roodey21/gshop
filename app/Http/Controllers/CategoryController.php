<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::isParent()->get();
        return view('admin.category.create', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $category = Category::create($data);
        if(!isset($data['status'])) {
            $category->update(['status' => 0]);
        }
        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(Category $category)
    {
        $categories = Category::isParent()->get();
        return view('admin.category.edit', compact('category', 'categories'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        if(!isset($data['status'])) {
            $category->update(['status' => 0]);
        }
        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy(Category $category)
    {
        if($category->subCategories()->exists()) {
            return redirect()->route('admin.category.index')->with('error', 'Kategori tidak bisa dihapus karena memiliki sub kategori');
        }
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil dihapus');
    }
}
