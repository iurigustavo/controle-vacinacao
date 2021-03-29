<?php

    namespace App\Http\Requests\Usuarios;

    use Illuminate\Foundation\Http\FormRequest;

    class UsuarioRequestCreate extends FormRequest
    {
        public function rules()
        {
            return [
                'name'     => 'required',
                'password' => 'required',
                'email'    => 'required|email|unique:users,email',
                'enabled'  => 'required',
                'role'     => 'required',
            ];
        }

        public function authorize()
        {
            return TRUE;
        }


    }
