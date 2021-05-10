<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Departments;
use Illuminate\Support\Facades\Input;   

class DepartmentRequest extends FormRequest
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
            'title.required' =>'Department name cannot be empty!',
            'title.regex' =>'The name may only contain letters, digits and space!',
            'title.unique' =>'Department name already in use!',
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
            "title"  => "required|regex:/^[\pL\s]+$/u|unique:departments,title,". $this->did,
        ];
    }
}
