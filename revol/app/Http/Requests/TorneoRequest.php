<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TorneoRequest extends FormRequest
{
    public function rules()
    {
        return [
            //'name' => ['required', Rule::unique('torneos')->ignore($this->route('torneo'))],
            'titulo' => ['required'],
            'juego' => ['required'],
            'fecha' => ['required'],
            'hora' => ['required'],
            'modalidad' => ['required'],
            'forma' => ['required'],
            'max_jugadores' => ['required'],
            'descripcion' => ['required'],
            'premios' => ['required'],
            'estatus' => ['required'],
        ];
    }
}
