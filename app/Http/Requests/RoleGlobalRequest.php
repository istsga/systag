<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleGlobalRequest extends FormRequest
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
        $rules = [
            'display_name'=> ['required', 'regex:/^[\pL\s\-]+$/u', 'string', 'min:3', 'max:30'], //|unique:roles
        ];

        if($this->method() !== 'PUT')
        {

        $rules['name'] = 'required|regex:/^[\pL\s\-]+$/u|min:3|max:30|unique:roles';

        }

        return $rules;
    }
}
