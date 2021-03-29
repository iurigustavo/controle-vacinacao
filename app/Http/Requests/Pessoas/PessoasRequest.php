<?php

    namespace App\Http\Requests\Pessoas;

    use App\Http\Helpers\DateUtils;
    use Illuminate\Foundation\Http\FormRequest;

    class PessoasRequest extends FormRequest
    {
        public function rules()
        {
            return [
                'nome'            => 'required',
                'cpf'             => 'required',
                'sexo'            => 'required',
                'cns'             => 'nullable',
                'data_nascimento' => 'required|date',
                'end_rua'         => 'nullable',
                'end_numero'      => 'nullable',
                'end_bairro'      => 'nullable',
                'end_cep'         => 'nullable',
                'end_cidade'      => 'nullable',
                'end_uf'          => 'nullable',
                'raca_id'         => 'required',

            ];
        }

        public function authorize()
        {
            return TRUE;
        }

        protected function prepareForValidation()
        {
            $this->merge([
                'nome'            => strtoupper($this->nome),
                'data_nascimento' => DateUtils::StringParaData($this->data_nascimento),
            ]);
        }
    }
