<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'password' => 'nullable|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
           
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống.',
        
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'avatar.image' => 'Tập tin phải là hình ảnh.',
            'avatar.mimes' => 'Hình ảnh phải là một tập tin loại: jpeg, png, jpg, gif.',
            'avatar.max' => 'Hình ảnh không được lớn hơn 2 megabytes.',
        ];

    }
}
