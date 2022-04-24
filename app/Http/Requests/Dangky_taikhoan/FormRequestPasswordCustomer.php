<?php

namespace App\Http\Requests\Dangky_taikhoan;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestPasswordCustomer extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [


            'customer_password_confirm' => 'required|same:customer_password',
        ];
    }
    public function messages(): array
    {
        return [

            'customer_password_confirm.same' => 'Mật khẩu xác nhận phải giống mật khẩu!',
        ];
    }
}
