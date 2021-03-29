<?php

    namespace App\Http\Requests\Vacinas;

    use App\Http\Helpers\DateUtils;
    use Carbon\Carbon;
    use Illuminate\Foundation\Http\FormRequest;

    class LoteRequest extends FormRequest
    {
        public function rules()
        {
            return [
                'descricao'       => 'required',
                'quantidade'      => 'nullable',
                'vacina_id'       => 'required',
                'data_vencimento' => 'nullable'
            ];
        }

        public function authorize()
        {
            return TRUE;
        }

        protected function prepareForValidation()
        {
            $this->merge([
                'data_vencimento' => DateUtils::StringParaData($this->data_vencimento),
            ]);
        }
    }
