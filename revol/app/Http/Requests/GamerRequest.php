<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GamerRequest extends FormRequest
{
    public function rules()
    {
        return [
            //'name' => ['required', Rule::unique('gamers')->ignore($this->route('gamer'))],
            //'name' => ['required', Rule::unique('gamers')->ignore($this->route('gamer'))],
            'nombre' => ['required'],
            'apellidos' => ['required'],
            'fecha_nac' => ['required'],
            'genero' => ['required'],
        ];
    }
}
