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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'int'],
            'email' => ['required', 'string', 'max:255', 'email'],
            'tel' => ['required', 'numeric'],
            'tel1' => ['required', 'numeric', 'digits_between:1,5'],
            'tel2' => ['required', 'numeric', 'digits_between:1,5'],
            'tel3' => ['required', 'numeric', 'digits_between:1,5'],
            'address' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer'],
            'detail' => ['required', 'string', 'max:120'],
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => '姓を入力してください',
            'last_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名＠ドメイン」形式で入力してください',
            'tel.required' => '電話番号を入力してください',
            'tel1.required' => '市外局番を入力してください',
            'tel1.digits_between' => '市外局番は5桁で入力してください',
            'tel2.required' => '市内局番を入力してください',
            'tel2.digits_between' => '市内局番は5桁で入力してください',
            'tel3.required' => '加入者番号を入力してください',
            'tel3.digits_between' => '加入者番号は5桁で入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問合わせ内容を入力してください',
            'detail.max' => 'お問合わせ内容は120文字以内で入力してください',
        ];
    }
}
