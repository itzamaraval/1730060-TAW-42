<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EjemploRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('ejemplos')->ignore($this->route('ejemplo'))],
        ];
    }
}
