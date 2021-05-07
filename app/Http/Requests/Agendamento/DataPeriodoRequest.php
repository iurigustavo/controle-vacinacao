<?php

    namespace App\Http\Requests\Agendamento;

    use Illuminate\Foundation\Http\FormRequest;

    class DataPeriodoRequest extends FormRequest
    {
        public function rules()
        {
            return [
                'agenda_id' => 'required'
            ];
        }
    }
