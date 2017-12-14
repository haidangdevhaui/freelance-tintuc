<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'slug' => 'required',
            'type' => 'required',
            'position' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng điền tên chuyên mục ',
            'slug.required' => 'Vui lòng điền slug ',
            'type.required' => 'Vui lòng chọn kiẻu bài viết ',
            'position.required' => 'Vui lòng chọn vị trí hiển thị ',
        ];
    }
}
