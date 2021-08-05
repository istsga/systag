<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuspensoUpdateRequest extends FormRequest
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
            'asignacione_id'              => ['required' ],
            'asignatura_id'               => ['required' ],
            'estudiante_id'               => ['required'],
            'promedio_final'              => ['required', 'numeric','between:0,10'],
            'examen_suspenso'             => ['required', 'numeric','between:0,10'],
            'suma'                        => ['required', 'numeric','between:0,20'],
            'promedio_numero'             => ['required', 'numeric','between:0,10'],
            'promedio_letra'              => ['required'],
            'observacion'                 => ['required'],
        ];
    }
}
