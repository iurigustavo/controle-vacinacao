<?php

    namespace App\Http\Requests\Vacinacoes;

    use Auth;
    use Illuminate\Foundation\Http\FormRequest;

    class VacinacoesSegundaDoseRequest extends FormRequest
    {
        public function rules()
        {
            return [
                'dt_segunda'             => 'required',
                'fk_tbgrhdepartamento_2' => 'required',
                'fk_tbgrhcargo_2'        => 'required',
                'tx_observacao_2'        => 'nullable',
                'co_usuario'             => 'required',
            ];
        }

        public function authorize()
        {
            return TRUE;
        }

        protected function prepareForValidation()
        {
            $this->merge([
                'co_usuario' => Auth::user()->pk_id,
            ]);
        }
    }
