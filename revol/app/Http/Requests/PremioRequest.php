<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PremioRequest extends FormRequest
{
    public function rules()
    {
        return [
            //'name' => ['required', Rule::unique('premios')->ignore($this->route('premio'))],
            "primer_lugar" => ['required'],
            "segundo_lugar" => ['required'],
            "tercer_lugar" => ['required']
        ];
    }
}
