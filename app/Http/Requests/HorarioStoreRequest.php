<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class HorarioStoreRequest extends FormRequest
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
        $todayDate = now();
        $todayDate = $todayDate->format('Y-m-d');

        $rules = [
            'asignacione_id'        => ['required'],
            'asignatura_id'         => ['required', 'exists:asignaturas,id'],
            // 'dia_semana'            => ['required', 'string'],
            // 'hora_inicio'           => ['required'],
            // 'hora_final'            => ['required'],
            'cantidad_hora'         => ['required', 'integer'],
            'fecha_inicio'          => ['required',  'date', 'after_or_equal:' .$todayDate ],
            'fecha_final'           => ['required', 'date', 'after:fecha_inicio'],
            'fecha_examen'          => ['required', 'date', 'after:fecha_final'],
            'fecha_suspension'      => ['required', 'date', 'after:fecha_examen'],
            'orden'                 => ['required'],
        ];

        return $rules;
    }
}
