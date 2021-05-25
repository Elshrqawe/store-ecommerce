<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
           // 'slug' => 'required|unique:categories,slug,'.$this -> id
            'photo' => 'required_without:id|mimes:jpg,jpeg,png'
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'يجب ادخال هذ الحقل *',
            'photo.required' => 'يجب ادخال هذ الحقل *',
            'photo.mimes' => 'يجب ان تكون صوره من نوع (jpg او jpeg او png)',


        ];
    }

}
