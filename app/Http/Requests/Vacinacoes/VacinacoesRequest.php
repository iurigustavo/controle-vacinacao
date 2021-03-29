<?php

    namespace App\Http\Requests\Vacinacoes;

    use Carbon\Carbon;
    use Illuminate\Foundation\Http\FormRequest;

    class VacinacoesRequest extends FormRequest
    {
        public function rules()
        {
            return [
                'tx_nome'                          => 'required',
                'nu_cpf'                           => 'required',
                'nu_cns'                           => 'nullable',
                'dt_nascimento'                    => 'required',
                'tp_sexo'                          => 'required',
                'st_positivado_anterior'           => 'nullable',
                'tx_mes'                           => 'required_if:st_positivado_anterior,1',
                'tx_ano'                           => 'required_if:st_positivado_anterior,1',
                'fk_tbsaudcovidvacinacaorestricao' => 'nullable',
                'co_usuario'                       => 'required',
                'co_departamento'                  => 'required',
                'dt_cadastro'                      => 'required',
            ];
        }

        public function authorize()
        {
            return TRUE;
        }

        protected function prepareForValidation()
        {
            $this->merge([
                'co_usuario'             => '1',
                'co_departamento'        => '1',
                'dt_cadastro'            => Carbon::now(),
                'st_positivado_anterior' => $this->st_positivado_anterior ?? 0,
            ]);
        }
    }
