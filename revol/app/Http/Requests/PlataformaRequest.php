<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PlataformaRequest extends FormRequest
{
    public function rules()
    {
        return [
            //'nombre' => ['required', Rule::unique('plataformas')->ignore($this->route('plataforma'))],
            'nombre' => ['required'],
            'costo' => ['required'],
            'costo_monedas' => ['required'],
            'monedas_hora' => ['required'],
        ];
    }
}
