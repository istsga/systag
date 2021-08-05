<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsignacioneUpdateRequest extends FormRequest
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
            'periodacademicos' => ['required', 'exists:periodacademicos,id'],
            'carreras'=>['required', 'exists:carreras,id'],
            'periodo_id'=>['required', 'exists:periodos,id'],
            'seccione_id' => ['required', 'exists:secciones,id'],
            'paralelo_id' => ['required', 'exists:paralelos,id'],
        ];

        return $rules;
    }
}
