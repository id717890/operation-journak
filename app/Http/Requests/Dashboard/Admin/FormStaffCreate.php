<?php

namespace App\Http\Requests\Dashboard\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FormStaffCreate extends FormRequest
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
            'fio' => 'required',
            'phone' => 'required',
            'post' => 'required',
            'department' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'fio.required' => 'Укажите фамилию, имя, отчество',
            'phone.required' => 'Укажите телефон',
            'post.required' => 'Укажите должность',
            'department.required' => 'Укажите подразделение'
        ];
    }
}
