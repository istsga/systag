<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeriodacademicoStoreRequest extends FormRequest
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
        $date = now();
        $date = $date->format('Y-m-d');

         $rules = [
             'estado' => ['required' ],
             'periodo' => ['required', 'unique:periodacademicos', 'string', 'min:3', 'max:50' ],
             'fecha_inicio' => ['required', 'date', 'after_or_equal:'.$date],
             'fecha_final' => ['required', 'date', 'after:fecha_inicio' ],
             'carreras'=>['required', 'exists:carreras,id'],
         ];

         return $rules;
    }
}
