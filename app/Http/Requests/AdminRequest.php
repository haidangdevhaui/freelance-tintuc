<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ];
    }
    public function messages() {
        return [
            'name.required' => 'Vui lòng nhập tên ',
            'email.required' => 'Vui lòng email ',
            'password.required' => 'Vui mật khẩu ',
            'email.unique' => 'Email đã tồn tại, vui lòng chọn email khác '
        ];
    }
}
