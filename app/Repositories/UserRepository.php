<?php


    namespace App\Repositories;


    use App\Models\User;
    use Exception;
    use Illuminate\Database\Eloquent\Collection;

    class UserRepository
    {
        protected User $user;

        /**
         * UserRepository constructor.
         *
         * @param  User  $user
         */
        public function __construct(User $user)
        {
            $this->user = $user;
        }


        /**
         * @return User[]|Collection
         */
        public function getAll(): Collection
        {
            return $this->user->get();
        }

        /**
         * @param $id
         *
         * @return User[]|Collection
         */
        public function getById($id)
        {
            return $this->user->where('id', $id)->get();
        }

        /**
         * @param $id
         *
         * @return User|null
         */
        public function findById($id): ?User
        {
            return $this->user->find($id);
        }

        /**
         * @param $data
         *
         * @return User|null
         */
        public function save($data): ?User
        {
            /** @var User $model */
            $model = new $this->user;

            $model->fill($data);
            $model->save();

            return $model->fresh();

        }

        /**
         * @param $data
         * @param $id
         *
         * @return User
         */
        public function update($data, $id): User
        {
            $model = $this->user->find($id);
            $model->fill($data);
            $model->update();
            return $model;
        }

        /**
         * @param $id
         *
         * @return User
         * @throws Exception
         */
        public function delete($id)
        {
            $model = $this->user->find($id);
            $model->delete();
            return $model;
        }


    }