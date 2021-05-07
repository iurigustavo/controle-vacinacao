<?php

    namespace App\Http\Requests\Agendamento;

    use App\Http\Helpers\DateUtils;
    use Illuminate\Foundation\Http\FormRequest;

    class DadosPessoaisRequest extends FormRequest
    {

        public function rules()
        {
            return [
                'nome'            => 'required',
                'cpf'             => 'required',
                'sexo'            => 'required',
                'data_nascimento' => 'required|date',
                'telefone'        => 'required',
                'cns'             => 'nullable'
            ];
        }
        protected function prepareForValidation()
        {
            $this->merge([
                'nome'            => strtoupper($this->nome),
                'data_nascimento' => DateUtils::StringParaData($this->data_nascimento),
            ]);
        }
    }
