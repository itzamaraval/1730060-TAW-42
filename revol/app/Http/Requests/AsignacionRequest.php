<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AsignacionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'consola_id' => ['required'],
            'juego_id' => ['required'],
        ];
    }
}
