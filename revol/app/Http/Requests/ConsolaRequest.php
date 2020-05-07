<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ConsolaRequest extends FormRequest
{
    public function rules()
    {
        return [
            'numero' => ['required', Rule::unique('consolas')->ignore($this->route('consola'))],
            'plataforma_id' => ['required'],
            'disponible' => ['required']
        ];
    }
}
