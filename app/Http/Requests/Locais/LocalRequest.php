<?php

    namespace App\Http\Requests\Locais;

    use Illuminate\Foundation\Http\FormRequest;

    class LocalRequest extends FormRequest
    {
        public function rules()
        {
            return [
                'descricao' => 'required',
                'endereco'  => 'required',
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
