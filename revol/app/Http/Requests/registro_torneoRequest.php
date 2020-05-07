<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class registro_torneoRequest extends FormRequest
{
    public function rules()
    {
        return [
            //'name' => ['required', Rule::unique('registro_torneos')->ignore($this->route('registro_torneo'))],
            'gamer' => ['required'],
            'torneo' => ['required'],
        ];
    }
}
