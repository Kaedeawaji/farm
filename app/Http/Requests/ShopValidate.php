<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopValidate extends FormRequest
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
     * バリデーションエラーメッセージ
     *
     * @var array
     */
    protected $messages = [
        'name.required' => '事業者名を入力してください。',
    ];
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email:rfc', 'max:255',],
            'tel' => ['required', 'regex:/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{4}$/'],
            'address' => ['required', 'max:50',],

        ];
    }
}
