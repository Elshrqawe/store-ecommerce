<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingsRequest extends FormRequest
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
            'id'=> 'required|exists:settings',
            'value' => 'required',
            'plain_value' => 'nullable|numeric',//numeric -> قيمه رقم
        ];
    }
    public function messages()
    {
        return [
            'id.required' => 'هذا id موجود بلفعل',
            'id.exists' => 'هذا الايدي غير موجود',
            'value.required' => 'لايمكن ترك هذه الخانه فارغه',
            'plain_value.numeric' => 'يجب ان يكون رقم',

        ];
    }
}
