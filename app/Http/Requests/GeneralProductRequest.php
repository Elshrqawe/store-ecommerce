<?php

namespace App\Http\Requests;

use App\Http\Enumerations\CategoryType;
use Illuminate\Foundation\Http\FormRequest;

class GeneralProductRequest extends FormRequest
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
            'name' => 'required|max:100',
            'slug' => 'required|unique:products,slug',
            'description' => 'required|max:1000',
            'short_description' => 'nullable|max:500',
            'categories' => 'array|min:1', //[]
            'categories.*' => 'numeric|exists:categories,id',
            'tags' => 'nullable',
            'brand_id' => 'required|exists:brands,id'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يجب ادخال هذ الحقل *',
            'categories.required' => 'يجب ادخال هذ الحقل *',
            'name.max' => 'لايمكن ادخال اكثر من 100 حرف',
            'slug.required' => 'يجب ادخال هذ الحقل *',
            'slug.unique' => 'هذ الرابط موجود بلفعل *',
            'description.required' => 'يجب ادخال هذ الحقل  *',
            'brand_id.required' => 'يجب ادخال هذ الحقل  *',


        ];
    }

}
