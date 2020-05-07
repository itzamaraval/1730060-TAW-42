<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RentaRequest extends FormRequest
{
    public function rules()
    {
        return [
            //'name' => ['required', Rule::unique('rentas')->ignore($this->route('renta'))],
            'gamer_id' => ['required'],
            'consola_id' => ['required'],
            'nhoras' => ['required'],
            'monedas_gastadas'=>['required'],
            'total' => ['required']
        ];
    }
}
