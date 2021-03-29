<?php


    namespace App\Repositories;


    use App\Models\Cargo;
    use Exception;
    use Illuminate\Database\Eloquent\Collection;

    class CargoRepository
    {
        protected Cargo $cargo;

        /**
         * CargoRepository constructor.
         *
         * @param  Cargo  $cargo
         */
        public function __construct(Cargo $cargo)
        {
            $this->cargo = $cargo;
        }


        /**
         * @return Cargo[]|Collection
         */
        public function getAll(): Collection
        {
            return $this->cargo->get();
        }

        /**
         * @param $id
         *
         * @return Cargo[]|Collection
         */
        public function getById($id)
        {
            return $this->cargo->where('id', $id)->get();
        }

        /**
         * @param $id
         *
         * @return Cargo|null
         */
        public function findById($id): ?Cargo
        {
            return $this->cargo->find($id);
        }

        /**
         * @param $data
         *
         * @return Cargo|null
         */
        public function save($data): ?Cargo
        {
            /** @var Cargo $model */
            $model = new $this->cargo;

            $model->fill($data);
            $model->save();

            return $model->fresh();

        }

        /**
         * @param $data
         * @param $id
         *
         * @return Cargo
         */
        public function update($data, $id): Cargo
        {
            $model = $this->cargo->find($id);
            $model->fill($data);
            $model->update();
            return $model;
        }

        /**
         * @param $id
         *
         * @return Cargo
         * @throws Exception
         */
        public function delete($id)
        {
            $model = $this->cargo->find($id);
            $model->delete();
            return $model;
        }


    }