<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocenteStoreRequest extends FormRequest
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
            'tipo_identificacion' => ['required', 'boolean:1,0'],
            'nombre' => ['required', 'regex:/^[\pL\s\-]+$/u', 'string', 'min:3', 'max:30'],
            'apellido' => ['required', 'regex:/^[\pL\s\-]+$/u',  'string', 'min:3', 'max:30'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:100', 'unique:docentes',],
            'titulo_academico' => ['required', 'regex:/^[\pL\s\-]+$/u',  'string', 'min:5', 'max:60'],
            'abreviatura' => ['required', 'regex:/^[\pL\s\.]+$/u', 'min:2', 'max:10'],
            'fecha_ingreso' => ['required', 'date', ],
            'telefono_fijo' => [ 'nullable','digits_between:7,10'],
            'telefono_movil' => ['required', 'digits:10'],
            'provincia_id' => ['required'],
            'cantone_id' => ['required'],
            'calle' => ['required', 'string', 'max:255'],
            'estado' =>  ['required','boolean:1,0'],
            'tipocontrato_id' =>  ['required'],
        ];

        if($this->tipo_identificacion==0)
            {
                $rules['dni'] = ['required', 'unique:docentes', 'digits:10' ];
            }else{
                $rules['dni'] = ['required', 'unique:docentes', 'min:5', 'max:12'];
            }

        return $rules;
    }
}
