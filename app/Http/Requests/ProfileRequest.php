<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'email' => 'required|email|unique:admins,email,'.$this -> id,
            'password'  => 'nullable|confirmed|min:8'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'لايمكن ترك هذه الخانه فارغه',
            'email.required' => 'لايمكن ترك هذه الخانه فارغه',
            'email.email' => 'يجب ان يكون من نوع اميل',
            'email.unique' => 'هذا الاميل موجود بلفعل',
            'password.min:8' => 'يجب ان لا يقل عن 8 رقم',

        ];
    }
}
