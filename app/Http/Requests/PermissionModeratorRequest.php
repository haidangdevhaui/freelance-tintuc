<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionModeratorRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'select_moderator' => 'required',
			'select_category' => 'required',
		];
	}
	public function messages() {
		return [
			'select_moderator.required' => 'Vui lòng chọn Moderator',
			'select_category.required' => 'Vui lòng chọn chuyên mục',
		];
	}
}
