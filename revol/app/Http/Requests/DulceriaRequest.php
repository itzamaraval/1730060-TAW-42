<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DulceriaRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nombre_articulo' => ['required', Rule::unique('dulcerias')->ignore($this->route('dulceria'))],
            'costo' => ['required'],
        ];
    }
}
