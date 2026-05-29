<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
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
            'name' => ['required'],
            'explain' => ['required', 'max:255'],
            'picture' => ['required', 'image', 'mimes:jpeg,png'],
            'condition_id' => ['required'],
            'categories' => ['required', 'array'],
            'price' => ['required', 'integer', 'min:0']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'explain.required' => '商品の説明を入力してください',
            'explain.max' => '説明は255文字以内で入力してください',
            'picture.required' => '商品画像を選択してください',
            'condition_id.required' => '商品の状態を選択してください',
            'categories.required' => 'カテゴリーを選択してください',
            'price.required' => '価格を入力してください',
            'price.integer' => '価格は数字で入力してください',
            'price.min' => '価格は0円以上で入力してください'
        ];
    }
}
