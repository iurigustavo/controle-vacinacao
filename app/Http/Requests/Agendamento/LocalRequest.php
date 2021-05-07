<?php

namespace App\Http\Requests\Agendamento;

use Illuminate\Foundation\Http\FormRequest;

class LocalRequest extends FormRequest
{

    public function rules()
    {
        return [
            'local_id' => 'required'
        ];
    }
}
