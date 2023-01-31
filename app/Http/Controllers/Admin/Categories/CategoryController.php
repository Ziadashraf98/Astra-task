<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Traits\imageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use imageTrait;

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.all_categories' , compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.add_category');
    }

    public function store(CategoryRequest $request)
    {
        $validation = $request->validated();
        $validation['image'] = $this->addImage($request , 'categories');
        Category::create($validation);
        return redirect()->route('categories.index')->with('success' , 'Category Added Successfully');
    }
    
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.update_category' , compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $validation = $request->validated();
        $validation['image'] = $request->file('image') ? $this->updateImage($request , 'categories' , $category->image) : $category->image;
        $category->update($validation);
        return redirect()->route('categories.index')->with('success' , 'Category Updated Successfully');
    }
    
    public function destroy($id)
    {
        $category = Category::find($id);
        unlink(storage_path('app/public/' . $category->image)); 
        $category->delete();
        return back()->with('success', 'Category Deleted Successfully');
    }
}