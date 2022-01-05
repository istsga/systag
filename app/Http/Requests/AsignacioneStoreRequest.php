<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AsignacioneStoreRequest extends FormRequest
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

    public function messages()
    {
        return [
            'paralelo_id.unique' => 'Periodo, sección, paralelo ya ha sido registrado.',
        ];
    }
}
