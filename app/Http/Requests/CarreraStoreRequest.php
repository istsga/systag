<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarreraStoreRequest extends FormRequest
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
                'codigo' => ['required', 'unique:carreras', 'min:3', 'max:20'],
                'nombre' => ['required', 'unique:carreras', 'regex:/^[\pL\s\-]+$/u', 'string', 'min:3', 'max:60'],
                'titulo' => ['required', 'unique:carreras', 'min:6', 'max:60'],
                'numero_periodo' => ['required', 'digits_between: 1,10' ],
                'logo' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                'condicion' => ['required','boolean:1,0'],
            ];
            return $rules;
    }
}
