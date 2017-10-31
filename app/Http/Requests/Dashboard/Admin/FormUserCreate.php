<?php

namespace App\Http\Requests\Dashboard\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FormUserCreate extends FormRequest
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
            'name' => 'required|unique:users',
            'login' => 'required|unique:users',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required|min:4'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Необходимо указать имя пользователя',
            'login.required' => 'Необходимо указать логин',
            'password.required' => 'Необходимо указать пароль',
            'password_confirmation.required' => 'Подтвердите пароль'
        ];
    }
}
