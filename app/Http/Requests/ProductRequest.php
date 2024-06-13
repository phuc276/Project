<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return 
     */
    public function rules()
    {
        return [
            'image' => 'mimes:jpeg,png,jpg,gif|max:2048|max:3', // Quy tắc xác thực cho các hình ảnh
        ];
    }

    public function messages()
    {
       return [
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg hoặc gif.',
            'image.*max' => 'Kích thước của hình ảnh không được vượt quá :max 2048KB.',
            'image.max' => 'Bạn chỉ được chọn tối đa :max_images hình ảnh.',
        ];
    }
}
