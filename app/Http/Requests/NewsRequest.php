<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        if ($request->isMethod('GET')) {
            return [];
        }

        return [
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ];
    }
    public function messages() {
        return [
            'name.required' => 'Vui lòng nhập tên tin tức ',
            'slug.required' => 'Vui lòng nhập slug ',
            'description.required' => 'Vui lòng nhập mô tả ',
            'content.required' => 'Vui lòng nhập nội dung ',
            'category_id.required' => 'Vui lòng chọn chuyên mục ',
            'name.max' => 'Tên Quá chiều dài kí tự cho phép ',
            'slug.max' => 'Slug Quá chiều dài kí tự cho phép ',
            'meta_title.max' => 'Meta title Quá chiều dài kí tự cho phép ',
        ];
    }
}
