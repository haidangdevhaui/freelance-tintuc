<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'url' => 'required',
            'description' => 'required',
            'content' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên tin tức ',
            'slug.required' => 'Vui lòng nhập slug ',
            'url.required' => 'Vui lòng nhập url video',
            'description.required' => 'Vui lòng nhập mô tả ',
            'content.required' => 'Vui lòng nhập nội dung ',
        ];
    }
}
