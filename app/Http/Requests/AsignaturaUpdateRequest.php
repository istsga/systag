<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class AsignaturaUpdateRequest extends FormRequest
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
            'carrera_id' => ['required', 'exists:carreras,id'],
            'periodo_id' => ['required', 'exists:periodos,id'],

            'cod_asignatura'=> [
                'required','min:3', 'max:20', 'string',
                Rule::unique('asignaturas')->ignore( $this->route('asignatura')->id )],

            'nombre' => ['required',  'regex:/^[\pL\s\-]+$/u', 'min:3', 'max:96'],
            'cantidad_hora' => ['required', 'digits_between:2,3'],
        ];

        return $rules;
    }
}
