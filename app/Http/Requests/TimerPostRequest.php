<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimerPostRequest extends FormRequest {
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
			'name' => 'required',
			'timer_post' => 'required',
			'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'content' => 'required',
            'parent_category' => 'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
		];
	}
	public function messages() {
		return [
			'name.required' => 'Vui lòng nhập tiêu đề hẹn',
			'timer_post.required' => 'Vui lòng nhập thời gian hẹn',
			'title.required' => 'Vui lòng nhập tiêu đề tin tức ',
            'slug.required' => 'Vui lòng nhập slug tin tức',
            'description.required' => 'Vui lòng nhập mô tả tin tức',
            'content.required' => 'Vui lòng nhập nội dung tin tức ',
            'parent_category.required' => 'Vui lòng chọn chuyên mục tin tức ',
            'meta_title.required' => 'Vui lòng nhập meta title tin tức',
            'meta_keyword.required' => 'Vui lòng nhập meta keyword tin tức',
            'meta_description.required' => 'Vui lòng nhập meta description tin tức',
		];
	}
}
