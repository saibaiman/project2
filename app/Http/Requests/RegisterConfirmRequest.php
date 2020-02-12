<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterConfirmRequest extends FormRequest
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
            'class_id' => 'numeric|integer'
        ];
    }

    public function messages()
    {
        return [
            'class_id.numeric' => '正しい:attributeを選択してください。',
            'class_id.integer' => '正しい:attributeを選択してください。',
        ];
    }
}
