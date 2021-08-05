<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsignaturaStoreRequest extends FormRequest
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
            'carrera_id'        => ['required', 'exists:carreras,id'],
            'periodo_id'        => ['required', 'exists:periodos,id'],
            'cod_asignatura'    => ['required', 'unique:asignaturas',  'min:3', 'max:20'],
            'nombre'            => ['required',  'regex:/^[\pL\s\-]+$/u', 'min:3', 'max:96'],
            'cantidad_hora'     => ['required', 'digits_between:2,3'],
        ];
        return $rules;
    }
}
