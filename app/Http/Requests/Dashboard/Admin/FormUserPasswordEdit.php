<?php

namespace App\Http\Requests\Dashboard\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FormUserPasswordEdit extends FormRequest
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
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required|min:4'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Необходимо указать пароль',
            'password_confirmation.required' => 'Подтвердите пароль'
        ];
    }
}
