<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

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
    public function rules(Request $request)
    {
        if ($request->isMethod('GET')) {
            return [];
        }

        return [
            'title'  => 'required|max:255',
            'slug'   => 'required|max:255',
            'source' => 'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên tin tức ',
            'slug.required' => 'Vui lòng nhập slug ',
            'url.required'  => 'Vui lòng nhập url video',
        ];
    }
}
