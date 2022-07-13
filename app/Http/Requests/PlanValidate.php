<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanValidate extends FormRequest
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
        'name.required' => 'プラン名を入力してください。',
        'price.regex' => '半角数字で入力してください。',

    ];



    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'price' => 'required|numeric:/^[0-9０-９]+$/',
            'detail' => 'required|max:255'
        ];
    }
}
