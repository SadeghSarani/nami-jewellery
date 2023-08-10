<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'password' => 'required|string',
            'phone' => 'required|unique:users,phone'
        ];
    }

    public function messages()
    {
        return [
            'phone.unique' => 'شماره وارد شده قبلا در سیستم وارد شده است لطفا شماره دیگری امتحان کنید',
            'phone.required' => 'لطفا شماره را وارد کنید',
            'name.required' => 'نام کاربری اشتباه وارد شده است'
        ];

    }
}
