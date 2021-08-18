<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Categories;
use Illuminate\Support\Facades\Input;

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

    public function messages(){

        return [
            'title.required' =>'Category name cannot be empty!',
            //'title.regex' =>'The name may only contain letters, digits and space!',
            //'title.unique' =>'Category name already in use!',
            'department_id.required' => 'Please select a department!'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title"  => "required",
            "department_id" => "required"
            //|regex:/^[\pL\s]+$/u|unique:categories,title,". $this->cid
        ];
    }
}
