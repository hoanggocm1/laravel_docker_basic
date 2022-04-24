<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequestHocSinh extends FormRequest
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
            'name'=>'required',
            'lop'=>'required'
        ];
    }
    public function messages() : array
    {
        return [
            'name.required' => 'Vui lòng nhập tên học sinh.',
            'lop.required' => 'Địt mẹ mày, nhập lớp vào!'
        ];
    }
   
}
