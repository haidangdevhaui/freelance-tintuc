<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestEditAdmin extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ];
    }
    public function messages() {
        return [
            'name.required' => 'Vui lòng nhập tên vai admin ',
            'email.required' => 'Vui lòng nhập email admin ',
            'role.required' => 'Vui lòng nhập vai trò ',
            'email.unique' => 'Email đã tồn tại vui lòng chọn email khác '
        ];
    }
}
