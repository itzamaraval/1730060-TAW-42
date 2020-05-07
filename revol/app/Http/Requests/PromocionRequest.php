<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PromocionRequest extends FormRequest
{
    public function rules()
    {
        return [
            //'name' => ['required', Rule::unique('promocions')->ignore($this->route('promocion'))],
            'porcentaje_ventas' => ['required'],
            'cantidad_invitacion' => ['required'],
            'monedas_invitacion' => ['required'],
        ];
    }
}
