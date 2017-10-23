<?php

namespace App\Http\Requests\Engineer;

use Illuminate\Foundation\Http\FormRequest;

class FormOperJournalCreate extends FormRequest
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
            'start_date' => 'required',
            'who_was_notified' => 'required',
            'object' => 'required',
//            'dir_type' => 'required',
//            'obj_caption' => 'required',
            'issue' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'start_date.required' => 'Заполните обязательное поле',
            'who_was_notified.required' => 'Заполните обязательное поле',
            'object.required' => 'Заполните обязательное поле',
//            'dir_type.required' => 'Заполните обязательное поле',
//            'obj_caption.required' => 'Заполните обязательное поле',
            'issue.required' => 'Заполните обязательное поле'
        ];
    }
}
