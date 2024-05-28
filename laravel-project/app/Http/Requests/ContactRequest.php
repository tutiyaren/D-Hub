<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'tel' => 'required|string|max:15|regex:/^\d{2,4}-\d{2,4}-\d{3,4}$/',
            'title' => 'required|string|max:50',
            'contents' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'tel.required' => '電話番号を入力してください',
            'tel.string' => '電話番号は文字列で入力してください',
            'tel.max' => '電話番号は15文字いないで入力してください。',
            'tel.regex' => '電話番号の形式が無効です。ハイフンを含めた正しい形式（例: 000-1234-1234）で入力してください。',
            'title.required' => '件名を入力してください',
            'title.string' => '件名は文字列で入力してください',
            'title.max' => '件名は50文字以内で入力してください',
            'contents.required' => '内容を入力してください',
            'contents.string' => '内容は文字列で入力してください',
            'contents.max' => '内容は255文字以内で入力してください',
        ];
    }
}
