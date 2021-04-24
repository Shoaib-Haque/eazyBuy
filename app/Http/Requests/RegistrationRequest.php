<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\CustomerProfiles;

class RegistrationRequest extends FormRequest
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
            'name.required' =>'! Enter your name.',
            'name.regex' =>'! The name may only contain letters and space.',
            'email.required' =>'! Enter your email.',
            'email.email:rfc' => '! Invalid email address.',
            'email.unique' =>'! Email address already in use.',
            'password.required' =>'! Enter your password.',
            'password.min' => '! Password must be at least 6 characters.',
            'password.max'=> '! Password must be at most 20 characters.',
            'password_confirmation.same' => "! Passwords must match."
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
            "name"  => "required | regex:/^[\pL\s]+$/u",
            "email" => "required | email:rfc | unique:customer_profiles,email",
            "password" => "required | min:6 | max:20",
            "password_confirmation" => "same:password"
        ];
    }
}
