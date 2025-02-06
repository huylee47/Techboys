<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductVariantRequest extends FormRequest
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
            'color_id' => 'required',
            'model_id' => 'required',
            'price' => 'required|min:1000',
            'stock' => 'required|min:0',
        ];
    }
    public function messages(){
        return [
            'color_id.required' => 'Vui lòng chọn màu.',
            'model_id.required' => 'Vui lòng chọn mô hình.',
            'price.required' => 'Vui lòng nhập giá.',
            'price.min' => 'Giá phải lớn hơn 1000 VNĐ.',
            'stock.required' => 'Vui lòng nhập số lượng hàng.',
        ];
    }
}
