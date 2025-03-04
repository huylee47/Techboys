<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkoutRequest extends FormRequest
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
            'full_name'       => 'required|string|max:255',
            'phone' => ['required', 'string', 'regex:/^(\+84|0)[0-9]{9,10}$/'],
            'email'           => 'required|email|max:255',
            'province_id'     => 'required',
            'district_id'     => 'required',
            'ward_id'         => 'required',
            'address'         => 'required|string|max:500',
        ];
    }
    public function messages()
    {
        return [
            'full_name.required'      => 'Vui lòng nhập họ và tên.',
            'phone.required'          => 'Vui lòng nhập số điện thoại.',
            'phone.regex'             => 'Số điện thoại không hợp lệ.',
            'email.required'          => 'Vui lòng nhập email.',
            'email.email'             => 'Email không hợp lệ.',
            'address.required'        => 'Vui lòng nhập địa chỉ giao hàng.',
            'province_id.required'    => 'Vui lòng chọn tỉnh/thành phố.',
            'district_id.required'    => 'Vui lòng chọn quận/huyện.',
            'ward_id.required'        => 'Vui lòng chọn phường/xã.',
        ];
    }
}
