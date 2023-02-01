<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return [
            'name'=>'required|unique:products,name,' . $this->name . ',id,subcategory,' . $this->subcategory,
            'name'=>'required|unique:products,name,' . $this->name . ',id,category_id,' . $this->category_id,
            'category_id'=>'required',
            'subcategory'=>'required',
        ];
    }
}
