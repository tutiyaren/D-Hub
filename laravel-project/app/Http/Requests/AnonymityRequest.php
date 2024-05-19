<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnonymityRequest extends FormRequest
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
            'nickname' => 'required|string|max:50'
        ];
    }

    public function messages()
    {
        return [
            'nickname.required' => 'ニックネームを入力してください',
            'nickname.string' => 'ニックネームは文字列で入力してください',
            'nickname.max' => 'ニックネームは50文字以内で入力してください',
        ];
    }
}
