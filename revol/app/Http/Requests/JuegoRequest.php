<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JuegoRequest extends FormRequest
{
    public function rules()
    {
        return [
            //'name' => ['required', Rule::unique('juegos')->ignore($this->route('juego'))],
            'titulo' => ['required'],
            'plataformas' => ['required']//,
            //'imagen' => ['required']
        ];
    }
}
