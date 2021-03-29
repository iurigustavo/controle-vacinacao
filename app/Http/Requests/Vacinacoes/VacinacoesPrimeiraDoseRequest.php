<?php

    namespace App\Http\Requests\Vacinacoes;

    use Auth;
    use Illuminate\Foundation\Http\FormRequest;

    class VacinacoesPrimeiraDoseRequest extends FormRequest
    {
        public function rules()
        {
            return [
                'dt_primeira'            => 'required',
                'fk_tbgrhdepartamento_1' => 'required',
                'fk_tbgrhcargo_1'        => 'required',
                'tx_observacao_1'        => 'nullable',
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
