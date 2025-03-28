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
            'name' => 'required|string|max:255|unique:products,name,' . $this->id,
            'brand_id' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    
        if ($this->input('is_featured') == 0) {
            $rules['base_price'] = [
                'required',
                'numeric',
                'min:1',
                function ($attribute, $value, $fail) {
                    if (trim($value) === '') {
                        $fail('Giá gốc không được để trống hoặc chỉ chứa dấu cách.');
                    }
                }
            ];
            $rules['base_stock'] = 'required|numeric|min:0';
        } else {
            $rules['variants'] = 'required|array|min:1';
            $rules['variants.*.price'] = 'required|numeric|min:1';
    
            // Kiểm tra thuộc tính động của từng biến thể
            $rules['variants.*.attributes'] = [
                'required',
                'array',
                function ($attribute, $value, $fail) {
                    if (!is_array($value) || empty($value)) {
                        $fail('Mỗi biến thể phải có ít nhất một thuộc tính.');
                    }
                }
            ];
    
            // Kiểm tra giá trị của từng thuộc tính trong biến thể
            $rules['variants.*.attributes.*'] = [
                'required',
                function ($attribute, $value, $fail) {
                    if (($value) == '') {
                        $fail('Tất cả các thuộc tính của biến thể phải được chọn.');
                    }
                }
            ];
        }
    
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
            'description.required' => 'Mô tả sản phẩm không được để trống.',
            'img.image' => 'Ảnh không hợp lệ.',
            'img.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg, gif.',
            'img.max' => 'Kích thước ảnh tối đa là 2MB.',
    
            'base_price.required' => 'Giá gốc không được để trống.',
            'base_price.numeric' => 'Giá gốc phải là số.',
            'base_price.min' => 'Giá gốc không thể nhỏ hơn 1.',
            'base_stock.required' => 'Số lượng không được để trống.',
            'base_stock.numeric' => 'Số lượng phải là số.',
            'base_stock.min' => 'Số lượng không thể nhỏ hơn 0.',
    
            'variants.required' => 'Sản phẩm có biến thể, vui lòng thêm ít nhất một biến thể.',
            'variants.array' => 'Dữ liệu biến thể không hợp lệ.',
            'variants.min' => 'Sản phẩm có biến thể, vui lòng thêm ít nhất một biến thể.',
            'variants.*.price.required' => 'Giá biến thể không được để trống.',
            'variants.*.price.numeric' => 'Giá biến thể phải là số.',
            'variants.*.price.min' => 'Giá biến thể không thể nhỏ hơn 1.',
    
            'variants.*.attributes.required' => 'Mỗi biến thể phải có ít nhất một thuộc tính.',
            'variants.*.attributes.array' => 'Thuộc tính của biến thể phải là một mảng.',
            'variants.*.attributes.*.required' => 'Tất cả các thuộc tính của biến thể phải được chọn.',
        ];
    }
    
}
