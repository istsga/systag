<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserUpdateRequest extends FormRequest
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
        $rules =[
            'dni' => [
                'required', 'digits:10',
                Rule::unique('users')->ignore($this->route('user')->id)],
            'nombre' => ['required', 'regex:/^[\pL\s\-]+$/u',  'string', 'max:255'],
            'apellido' => ['required', 'regex:/^[\pL\s\-]+$/u',  'string', 'max:255'],
            'email' => [
                'email:rfc,dns',
                'required',
                Rule::unique('users')->ignore( $this->route('user')->id)
            ]
        ];
        //Verificar contraseñas
        if ($this->filled('password'))
        {
            $rules['password'] = ['confirmed', 'required',
                Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()
            ];
        }
        return $rules;
    }

}
