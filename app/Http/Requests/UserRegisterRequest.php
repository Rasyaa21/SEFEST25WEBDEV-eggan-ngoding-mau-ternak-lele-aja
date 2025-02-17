<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:4|unique:users',
            'email' => 'required|email',
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        ]; 
    }
    public function messages()
    {
        return [
            'name.required' => 'Username is required',
            'name.min' => 'Username must be at least 4 characters',
            'name.unique' => 'Username has already been taken',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email address',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, and one number'
        ];
    }
}
