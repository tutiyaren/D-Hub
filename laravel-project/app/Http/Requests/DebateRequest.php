<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DebateRequest extends FormRequest
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
            'genre_id' => 'required',
            'title' => 'required|string|max:50',
            'contents' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'genre_id.required' => 'ジャンルを選択してください',
            'title.required' => 'タイトルを入力してください',
            'title.string' => 'タイトルを文字列で入力してください',
            'title.max' => 'タイトルを50文字以内で入力してください',
            'contents.required' => '内容を入力してください',
            'contents.string' => '内容を文字列で入力してください',
            'contents.max' => '内容を255文字以内で入力してください',
        ];
    }
}
