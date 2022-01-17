<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SuspensoStoreRequest extends FormRequest
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
            'asignacione_id'              => ['required' ],
            'asignatura_id'               => ['required' ],
            //'estudiante_id'               => ['required' ],

            'estudiante_id'=>Rule::unique('suspensos')->where(function ($query) {
                return $query->where('asignacione_id', $this->asignacione_id)
                             ->where('asignatura_id', $this->asignatura_id);
            }),

            'promedio_final'              => ['required', 'numeric','between:0,6'],
            'examen_suspenso'             => ['required', 'numeric','between:0,10'],
            'suma'                        => ['required', 'numeric','between:0,16'],
            'promedio_numero'             => ['required', 'numeric','between:0,8'],
            'promedio_letra'              => ['required'],
            'observacion'                 => ['required'],
        ];


        return $rules;
    }
}
