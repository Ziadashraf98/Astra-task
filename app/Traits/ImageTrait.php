<?php

namespace App\Traits;

use App\Http\Requests\CategoryRequest;

trait imageTrait
{
    public function addImage(CategoryRequest $request , $folderName)
    {
        $image = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs($folderName , $image , 'local');
        return $path;
    }
    
    public function updateImage(CategoryRequest $request , $folderName , $imagePath)
    {
        unlink(storage_path('app/public/' . $imagePath));
        $image = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs($folderName , $image , 'local');
        return $path;
    }
}