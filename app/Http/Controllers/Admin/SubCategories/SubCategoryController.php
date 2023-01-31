<?php

namespace App\Http\Controllers\Admin\SubCategories;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategories.add_subcategory' , compact('categories'));
    }

    public function store(SubCategoryRequest $request)
    {
        $validation = $request->validated();
        SubCategory::create($validation);
        return redirect()->route('categories.index')->with('success' , 'SubCategory Added Successfully');
    }
}
