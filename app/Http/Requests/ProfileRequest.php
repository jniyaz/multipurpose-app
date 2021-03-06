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
            'name' => 'required|min:4|max:100',
            'phone' => 'required|numeric',
            'address' => 'sometimes|max:150',
            'biography' => 'sometimes|max:200'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':Attribute is required'
        ];
    }
}
