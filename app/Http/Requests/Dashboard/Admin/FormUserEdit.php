<?php

namespace App\Http\Requests\Dashboard\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FormUserEdit extends FormRequest
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
            'name' => 'required',
            'login' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Необходимо указать имя пользователя',
            'login.required' => 'Необходимо указать логин'
        ];
    }
}
