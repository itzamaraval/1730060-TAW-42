<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HistorialRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('historials')->ignore($this->route('historial'))],
        ];
    }
}
