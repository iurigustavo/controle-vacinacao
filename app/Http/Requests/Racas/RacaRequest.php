<?php

    namespace App\Http\Requests\Racas;

    use Carbon\Carbon;
    use Illuminate\Foundation\Http\FormRequest;

    class RacaRequest extends FormRequest
    {
        public function rules()
        {
            return [
                'descricao' => 'required',
            ];
        }

        public function authorize()
        {
            return TRUE;
        }

    }
