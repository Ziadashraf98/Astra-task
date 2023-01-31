<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $routeName = $this->route()->getName();

        return [
            'name'=>[$routeName == 'categories.store' ? 'unique:categories' : 'nullable' , 'required'],
            'description'=>'nullable',
            'image'=>[$routeName == 'categories.store' ? 'required' : 'nullable'],
        ];
    }
}