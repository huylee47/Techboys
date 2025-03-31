<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributesRequest extends FormRequest
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
        // Lấy ID từ route nếu có
        $id = $this->route('id');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                $id ? 'unique:attributes,name,' . $id : 'unique:attributes,name',
            ],
            'values' => 'required|array|min:1',
            'values.*' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên thuộc tính.',
            'name.max' => 'Tên thuộc tính không được vượt quá 255 ký tự.',
            'name.unique' => 'Thuộc tính này đã tồn tại.',
            'values.required' => 'Vui lòng chọn ít nhất một giá trị cho thuộc tính.',
            'values.*.required' => 'Vui lòng nhập tên giá trị cho thuộc tính.',
            'values.*.max' => 'Tên giá trị thuộc tính không được vượt quá 255 ký tự.',
        ];
    }
}
