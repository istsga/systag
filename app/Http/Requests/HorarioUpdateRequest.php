<?php

namespace App\Http\Requests;

use App\Models\Periodacademico;
use Illuminate\Foundation\Http\FormRequest;

class HorarioUpdateRequest extends FormRequest
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
        $periodo=Periodacademico::
        join('asignacione_periodacademico','asignacione_periodacademico.periodacademico_id','periodacademicos.id')
        ->where('asignacione_periodacademico.asignacione_id',$this->asignacione_id)
        ->first();

        $inicio_periodo=$periodo->fecha_inicio;
        $fin_periodo=$periodo->fecha_final;

        $rules = [
            'asignacione_id'        => ['required'],
            // 'asignatura_id'         => ['required', 'exists:asignaturas,id'],
            // 'dia_semana'            => ['required', 'string'],
            // 'hora_inicio'           => ['required'],
            // 'hora_final'            => ['required'],
            'cantidad_hora'         => ['required', 'integer'],
            'fecha_inicio'          => ['required',  'date', 'after_or_equal:' .$inicio_periodo,'before_or_equal:' .$fin_periodo ],
            'fecha_final'           => ['required', 'date', 'after:fecha_inicio', 'after:' .$inicio_periodo,'before_or_equal:' .$fin_periodo],
            'fecha_examen'          => ['required', 'date', 'after:fecha_final', 'after:' .$inicio_periodo,'before_or_equal:' .$fin_periodo],
            'fecha_suspension'      => ['required', 'date', 'after:fecha_examen', 'after:' .$inicio_periodo,'before_or_equal:' .$fin_periodo],
            'orden'                 => ['required'],
        ];

        return $rules;
    }
}
