<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        $asignacione_id = $this->asignacione_id;
        //dd($estudiante_id);

       return [
            'asignacione_id' => ['required' ],
            'asignatura_id' => ['required' ],
            //'firstName' => 'unique:people,firstName,NULL,id,lastName,' . $request->lastName,
            'estudiante_id' => ['required'],
            //'estudiante_id'=>'required|unique:calificaciones,estudiante_id,NULL,id,asignacione_id,'.$asignacione_id,
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
}
