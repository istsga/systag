<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class CarreraUpdateRequest extends FormRequest
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
            'codigo'=> [
                'required','min:3', 'max:20',
                Rule::unique('carreras')->ignore( $this->route('carrera')->id )],
            'nombre'=> [
                'required','min:3', 'max:60', 'string', 'regex:/^[\pL\s\-]+$/u',
                Rule::unique('carreras')->ignore( $this->route('carrera')->id )],
            'titulo'=> [
                'required','min:6', 'max:60', 'string',
                Rule::unique('carreras')->ignore( $this->route('carrera')->id )],
            'numero_periodo' => ['required', 'digits_between: 1,10'],
            'condicion' => ['required', 'boolean:1,0'],
        ];

        return $rules;
    }
}
