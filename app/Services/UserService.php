<?php


    namespace App\Services;


    use App\Http\Requests\Usuarios\ProfileRequestUpdate;
    use App\Http\Requests\Usuarios\UsuarioRequestCreate;
    use App\Http\Requests\Usuarios\UsuarioRequestUpdate;
    use App\Models\User;
    use App\Repositories\UserRepository;
    use Exception;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use InvalidArgumentException;
    use Throwable;
    use Validator;

    class UserService
    {
        protected UserRepository $userRepository;

        /**
         * UserService constructor.
         *
         * @param  UserRepository  $userRepository
         */
        public function __construct(UserRepository $userRepository)
        {
            $this->userRepository = $userRepository;
        }

        /**
         * @return User[]|Collection
         */
        public function getAll()
        {
            return $this->userRepository->getAll();
        }

        /**
         * @param $id
         *
         * @return User|null
         */
        public function findById($id)
        {
            return $this->userRepository->findById($id);
        }

        /**
         * @param $data
         *
         * @return User|null
         */
        public function saveUser($data)
        {
            $rules = new UsuarioRequestCreate();

            $validator = Validator::make($data, $rules->rules());
            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            $data['password'] = bcrypt($data['password']);
            $user             = $this->userRepository->save($data);
            $user->assignRole($data['role']);
            return $user;
        }

        /**
         * @param $data
         * @param $id
         *
         * @return User
         * @throws Throwable
         */
        public function updateUser($data, $id)
        {
            $rules     = new UsuarioRequestUpdate();
            $validator = Validator::make($data, $rules->rules($id));

            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            $user = $this->userRepository->findById($id);
            if ($user->password != $data['password']) {
                $data['password'] = bcrypt($data['password']);
            }

            DB::beginTransaction();

            try {
                $model = $this->userRepository->update($data, $id);
                DB::table('model_has_roles')->where('model_id', $id)->delete();
                $user->assignRole($data['role']);

            } catch (Exception $e) {
                DB::rollBack();
                Log::info($e->getMessage());

                throw new InvalidArgumentException('Não foi possível atualizar o registro');
            }

            DB::commit();

            return $model;
        }

        /**
         * @param $data
         * @param $id
         *
         * @return User
         * @throws Throwable
         */
        public function updateProfile($data, $id)
        {
            $rules     = new ProfileRequestUpdate();
            $validator = Validator::make($data, $rules->rules($id));

            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            $user = $this->userRepository->findById($id);
            if ($user->password != $data['password']) {
                $data['password'] = bcrypt($data['password']);
            }

            DB::beginTransaction();

            try {
                $model = $this->userRepository->update($data, $id);
            } catch (Exception $e) {
                DB::rollBack();
                Log::info($e->getMessage());

                throw new InvalidArgumentException('Não foi possível atualizar o registro');
            }

            DB::commit();

            return $model;
        }


        /**
         * @param $id
         *
         * @return User
         * @throws Throwable
         */
        public function deleteById($id)
        {

            DB::beginTransaction();

            try {
                $model = $this->userRepository->delete($id);

            } catch (Exception $e) {
                DB::rollBack();
                Log::info($e->getMessage());

                throw new InvalidArgumentException('Não foi possível remover o registro');
            }

            DB::commit();

            return $model;
        }

        public function login($user, $senha)
        {
            return User::where('nu_cpf', $user)->where('tx_senha', $senha)->first();
        }
    }