<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCreateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'description' => 'required',
            'image' => 'required|image',
            'subject' => 'required|max:100'
        ];
    }

    public function messages()
    {
        return [
            'description' => 'لطفا متن را برای بلاگ بنویسید',
            'image' => 'لطفا عکسی را برای نمایش بلاگ انتخاب کنید',
            'subject' => 'لطفا موضوعی را برای بلاگ انتخاب کنید',
        ];
    }
}
