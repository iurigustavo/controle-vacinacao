<?php

    namespace App\Http\Requests\Vacinacoes;

    use App\Http\Helpers\DateUtils;
    use Illuminate\Foundation\Http\FormRequest;

    class VacinacaoDosesRequest extends FormRequest
    {
        public function rules()
        {
            return [
                'data'       => 'required|date',
                'observacao' => 'nullable',
                'pessoa_id'  => 'required',
                'dose_id'    => 'required',
                'cargo_id'   => 'required',
                'local_id'   => 'required',
                'lote_id'    => 'nullable',
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
