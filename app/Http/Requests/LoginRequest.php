<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'phone' => [
                'regex:/^09[0-9]{9}$/',
                'digits:11'
            ],
            'name' => 'string|exists:users.name',
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'phone' => 'شماره وارد شده صحیح نمیباشد',
            'password' => 'رمز عبور خود را وارد کنید',
        ];
    }
}
