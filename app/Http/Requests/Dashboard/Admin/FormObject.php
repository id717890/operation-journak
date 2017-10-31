<?php

namespace App\Http\Requests\Dashboard\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FormObject extends FormRequest
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
            'caption' => 'required',
            'object_type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'caption.required' => 'Необходимо указать наименование',
            'object_type.required' => 'Необходимо указать тип объекта'
        ];
    }
}
