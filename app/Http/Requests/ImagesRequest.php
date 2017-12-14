<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagesRequest extends FormRequest
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
            'input44' => 'required'
        ];
    }
    public function messages() {
        return [
            'input44.required' => 'Vui lòng chọn hình ảnh cần tải nên ',    
        ];
    }
}
