<?php

    namespace App\Http\Requests\Agenda;

    use App\Http\Helpers\DateUtils;
    use Illuminate\Foundation\Http\FormRequest;

    class AgendaRequest extends FormRequest
    {

        public function rules()
        {
            return [
                'data'             => 'required|date',
                'periodo'          => 'required',
                'quantidade'       => 'required|integer',
                'faixa_etaria_min' => 'required|integer',
                'faixa_etaria_max' => 'required|integer',
                'habilitado'       => 'required',
                'local_id'         => 'required',
            ];
        }

        public function authorize()
        {
            return TRUE;
        }

        protected function prepareForValidation()
        {
            $this->merge([
                'data' => DateUtils::StringParaData($this->data),
            ]);
        }
    }
