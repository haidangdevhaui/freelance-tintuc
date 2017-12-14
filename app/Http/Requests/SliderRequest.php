<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'description' => 'required',
            'content' => 'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên tin tức ',
            'slug.required' => 'Vui lòng nhập slug ',
            'description.required' => 'Vui lòng nhập mô tả ',
            'content.required' => 'Vui lòng nhập nội dung ',
            'meta_title.required' => 'Vui lòng nhập meta title ',
            'meta_keyword.required' => 'Vui lòng nhập meta keyword ',
            'meta_description.required' => 'Vui lòng nhập meta description ',
        ];
    }
}
