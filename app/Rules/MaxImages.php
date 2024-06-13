<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MaxImages implements Rule
{
    protected $maxCount;

    /**
     * Create a new rule instance.
     *
     * @param  int  $maxCount
     * @return void
     */
    public function __construct($maxCount)
    {
        $this->maxCount = $maxCount;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Kiểm tra xem $value có phải là một mảng không
        if (is_array($value)) {
            // Nếu $value là một mảng, kiểm tra số lượng phần tử
            return count($value) <= $this->maxCount;
        } else {
            // Nếu $value không phải là một mảng, trả về false
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Bạn chỉ được tải lên tối đa {$this->maxCount} hình ảnh.";
    }
}
