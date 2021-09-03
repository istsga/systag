<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PeriodacademicoUpdateRequest extends FormRequest
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
        //Formato de fechas
       $date = now();
       $date = $date->format('Y-m-d');

        $rules = [
            'estado' => ['required'],
            'periodo'=> [
                'required','min:3', 'max:50', 'string',
                Rule::unique('periodacademicos')->ignore( $this->route('periodacademico')->id )],
            'fecha_inicio' => ['required', 'date',
                Rule::unique('periodacademicos')->ignore( $this->route('periodacademico')->id )],
            'fecha_final' => ['required', 'date', 'after:fecha_inicio',
                Rule::unique('periodacademicos')->ignore( $this->route('periodacademico')->id )],
            'carreras'=>['required', 'exists:carreras,id'],
        ];

        return $rules;
    }
}
