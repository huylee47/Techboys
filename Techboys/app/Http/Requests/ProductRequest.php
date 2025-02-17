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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255|unique:products,name,'. $this->id,
            'brand_id' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'color_id' => 'required|array',
            'color_id.*' =>'required',
            'model_id' => 'required|array',
            'model_id.*' =>'required',
            'price' => 'required|array',
            'price.*' =>'required|min:0',
            'stock' => 'required|array',
            'stock.*' =>'required|min:0',
        ];

        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống.',
            'name.unique' => 'Tên sản phẩm đã tồn tại.',
            'brand_id.required' => 'Vui lòng chọn thương hiệu.',
            'brand_id.exists' => 'Thương hiệu không hợp lệ.',
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'category_id.exists' => 'Danh mục không hợp lệ.',
            'img.image' => 'Ảnh không hợp lệ.',
            'img.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg, gif.',
            'img.max' => 'Kích thước ảnh tối đa là 2MB.',
            'color_id.required' =>'Vui lòng chọn màu.',
            'model_id.required' =>'Vui lòng chọn dung lượng máy.',
            'price.*' => 'Vui lòng nhập giá.',
            'price.*.min'=> 'Giá không được nhỏ hơn 0.',
            'stock.*' => 'Vui lòng nhập số lượng.',
            'stock.*.min'=> 'Số lượng không được nhỏ hơn 0.'
        ];
    }
}
