<?php

    namespace App\Http\Requests\Usuarios;

    use App\Models\User;
    use Illuminate\Foundation\Http\FormRequest;

    class ProfileRequestUpdate extends FormRequest
    {
        public function rules($id = NULL)
        {
            if ($id == NULL) {
                $id = \Auth::id();
            }
            return [
                'name'     => 'required',
                'password' => 'required',
                'email'    => 'required|email|unique:users,email,'.$id,
                'enabled'  => 'required',
            ];
        }

        public function authorize()
        {
            return TRUE;
        }

        protected function prepareForValidation()
        {
            $this->merge([
                'password' => $this->password ?? User::find(\Auth::id())->password
            ]);
        }
    }
