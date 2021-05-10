<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Brands;
use Illuminate\Support\Facades\Input;

class BrandRequest extends FormRequest
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
            'name.required' =>'Brand name cannot be empty!',
            'name.regex' =>'The name may only contain letters, digits and space!',
            'name.unique' =>'Brand name already in use!',
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
            "name"  => "required|regex:/^[\pL\s]+$/u|unique:brands,name,". $this->bid,
        ];
    }
}
