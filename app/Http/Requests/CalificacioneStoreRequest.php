<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CalificacioneStoreRequest extends FormRequest
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
            'asignacione_id' => ['required' ],
            'asignatura_id' => ['required' ],

            'estudiante_id'=>Rule::unique('calificaciones')->where(function ($query) {
                return $query->where('asignacione_id', $this->asignacione_id)
                             ->where('asignatura_id', $this->asignatura_id);
            }),

            'docencia'                  => ['required', 'numeric','between:0,10'],
            'experimento_aplicacion'    => ['required', 'numeric','between:0,10'],
            'trabajo_autonomo'          => ['required', 'numeric','between:0,10'],
            'suma'                      => ['required', 'numeric','between:0,30'],
            'promedio_decimal'          => ['required', 'numeric','between:0,10'],
            'examen_principal'          => ['required', 'numeric','between:0,10'],
            'promedio_final'            => ['required', 'numeric','between:0,10'],
            'promedio_letra'            => ['required'],
            'numero_asistencia'         => ['required'],
            'porcentaje_asistencia'     => ['required', 'numeric','between:0,100'],
            'observacion'               => ['required'],
        ];

    }

    public function messages()
    {
        return [
            'estudiante_id.unique' => 'Estudiante ya ha sido registrado en la asignatura.',
        ];
    }
}
