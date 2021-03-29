<?php


    namespace App\Repositories;


    use App\Models\Local;
    use Exception;
    use Illuminate\Database\Eloquent\Collection;

    class LocalRepository
    {
        protected Local $local;

        /**
         * LocalRepository constructor.
         *
         * @param  Local  $local
         */
        public function __construct(Local $local)
        {
            $this->local = $local;
        }


        /**
         * @return Local[]|Collection
         */
        public function getAll(): Collection
        {
            return $this->local->get();
        }

        /**
         * @param $id
         *
         * @return Local[]|Collection
         */
        public function getById($id)
        {
            return $this->local->where('id', $id)->get();
        }

        /**
         * @param $id
         *
         * @return Local|null
         */
        public function findById($id): ?Local
        {
            return $this->local->find($id);
        }

        /**
         * @param $data
         *
         * @return Local|null
         */
        public function save($data): ?Local
        {
            /** @var Local $model */
            $model = new $this->local;

            $model->fill($data);
            $model->save();

            return $model->fresh();

        }

        /**
         * @param $data
         * @param $id
         *
         * @return Local
         */
        public function update($data, $id): Local
        {
            $model = $this->local->find($id);
            $model->fill($data);
            $model->update();
            return $model;
        }

        /**
         * @param $id
         *
         * @return Local
         * @throws Exception
         */
        public function delete($id)
        {
            $model = $this->local->find($id);
            $model->delete();
            return $model;
        }


    }