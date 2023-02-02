<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.all_products' , compact('products'));
    }

    public function create()
    {
        $categories = Category::whereHas('subcategories')->get();
        return view('admin.products.add_product' , compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $validation = $request->validated();
        Product::create($validation);
        return redirect()->route('products.index')->with('success' , 'Product Added Successfully');
    }

    public function getSubCategories($id)
    {
        $subcategories = SubCategory::where('category_id' , $id)->pluck('id' , 'name');
        return $subcategories;
    }
}