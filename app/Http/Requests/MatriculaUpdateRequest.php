<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatriculaUpdateRequest extends FormRequest
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
        $rules =  [
            'estudiante_id' => ['required', 'exists:estudiantes,id'],
            'asignacione_id'=>['required', 'exists:asignaciones,id'],
            'fecha_matricula'=>['required', 'date'],
            'asignaturas' => ['required', 'exists:asignaturas,id'],
            'tipo' => ['required'],
        ];

        return $rules;
    }
}
