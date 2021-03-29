<?php

    namespace App\Http\Requests\Vacinas;

    use Carbon\Carbon;
    use Illuminate\Foundation\Http\FormRequest;

    class VacinaRequest extends FormRequest
    {
        public function rules()
        {
            return [
                'descricao'    => 'required',
            ];
        }

        public function authorize()
        {
            return TRUE;
        }

//        protected function prepareForValidation()
//        {
//            $this->merge([
//                'co_usuario'      => '1',
//                'co_departamento' => '1',
//                'dt_cadastro'     => Carbon::now(),
//            ]);
//        }
    }
