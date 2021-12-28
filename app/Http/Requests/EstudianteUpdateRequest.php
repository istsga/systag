<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EstudianteUpdateRequest extends FormRequest
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
            'tipo_identificacion'           => ['required:1,0'],
            'nombre'                        => ['required', 'regex:/^[\pL\s\-]+$/u',  'min:3', 'max:30'],
            'apellido'                      => ['required', 'regex:/^[\pL\s\-]+$/u',  'min:3', 'max:30'],
            'foto'                          => 'required|image|mimes:jpg,jpeg,svg|max:1024',
            'estadocivile_id'               => ['required'],
            'fecha_nacimiento'              => ['required', 'date'],
            'nacionalidad'                  => ['required', 'regex:/^[\pL\s\-]+$/u', 'min:5', 'max:30'],
            'ocupacion'                     => ['required', 'regex:/^[\pL\s\-]+$/u', 'min:5', 'max:50'],
            'discapacidad'                  => ['required', 'boolean:0,1'],
            'etnia_id'                      => ['required'],
            'email'                         => [
                                                'required', 'email',  'max:64',
                                                Rule::unique('estudiantes')->ignore( $this->route('estudiante')->id )],
            'tiposangre_id'                 => ['required'],
            'miembro_hogar'                 => ['required', 'digits_between:1,2'],
            'ingreso_ec'                    => ['required', 'digits_between:2,4'],
            'direccion_provincia_id'        => ['required'],
            'direccion_cantone_id'          => ['required'],
            'calle'                         => ['required', 'string' , 'max:255'],
            'telefono_fijo'                 => [ 'nullable','digits_between:7,10'],
            'telefono_movil'                => ['required', 'digits:10'],
            'nombre_parentesco'             => ['required', 'regex:/^[\pL\s\-]+$/u', 'min:3', 'max:30'],
            'parentesco'                    => ['required', 'regex:/^[\pL\s\-]+$/u', 'min:3', 'max:15'],
            'telefono_parentesco'           => ['required', 'digits:10'],
            'institucion_origen'            => ['required', 'string', 'min:10', 'max:90'],
            'titulo_bachillerato'           => ['required', 'regex:/^[\pL\s\-]+$/u', 'min:6', 'max:90'],
            'nombre_padre'                  => ['required', 'regex:/^[\pL\s\-]+$/u', 'min:3','max:40'],
            'ocupacion_padre'               => ['required', 'regex:/^[\pL\s\-]+$/u', 'min:3','max:40'],
            'instruccione_id'               => ['required'],
            'nombre_madre'                  => ['required', 'regex:/^[\pL\s\-]+$/u',  'min:3', 'max:40'],
            'ocupacion_madre'               => ['required', 'regex:/^[\pL\s\-]+$/u', 'min:3','max:40'],
            'madre_instruccione_id'         => ['required'],
            'estado'                        => ['required'],
            'convalidacion'                 => ['required'],
        ];

        // Valdiar Cedula / pasaporte
        if($this->tipo_identificacion==0)
        {
            $rules['dni'] = [
                'required','digits:10',
                Rule::unique('estudiantes')->ignore( $this->route('estudiante')->id )];
        }else

        {
            $rules['dni'] = [
                'required', 'min:5', 'max:12',
                Rule::unique('estudiantes')->ignore( $this->route('estudiante')->id ) ];
        }

    //Validar Nacionalidad
        if($this->nacionalidad=='Ecuatoriana')
        {
            $rules['provincia_id'] = ['required'];
            $rules['cantone_id'] = ['required'];
        }else{
            $rules['lugar_nacimiento'] = ['required', 'min:5', 'max:60'];
        }

    //Validar Discapacidad
    if($this->discapacidad==1)
        {
            $rules['tipo_discapacidad'] = ['required', 'regex:/^[\pL\s\-]+$/u', 'min:5' , 'max:40' ];
            $rules['porcentaje_discapacidad'] = ['required', 'numeric','between:1,100' ];
        }else{
            $rules['tipo_discapacidad'] = ['nullable'];
            $rules['porcentaje_discapacidad'] = ['nullable'];
        }
        return $rules;
    }
}
