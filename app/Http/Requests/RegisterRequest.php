<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|min:6',

        ];
    }

    public function messages()
    {
       return [
        'name.required' => 'Tên không được để trống.',
        'email.required' => 'Email không được để trống.',
        'email.email' => 'Email phải là địa chỉ email hợp lệ.',
        'email.max' => 'Độ dài của email không được vượt quá 255 ký tự.',
        'email.unique' => 'Email đã được sử dụng, vui lòng chọn một email khác.',
        'password.required' => 'Mật khẩu không được để trống.',
        'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ];

    }
    }
