<?php

namespace App\Http\Requests;

use App\Rules\ProductQty;
use App\Rules\AttributeName;
use App\Rules\UniqueAttributeName;
use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
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

            //'name' => ['required', 'max:100', new UniqueAttributeName($this->name, $this->id)]
            'name' =>'required|max:100|unique:attribute_translations,name,' . $this->id
        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'يجب ادخال هذ الحقل *',
            'name.max' => 'يجب ان لا يذيد هذا الحقل عن 100 حرف',
            'name.unique' => 'هذا الاسم موجود بلفعل , لايمكن تكراره',

        ];
    }

}
