<?php


    namespace App\Repositories;


    use App\Models\Raca;
    use Exception;
    use Illuminate\Database\Eloquent\Collection;

    class RacaRepository
    {
        protected Raca $raca;

        /**
         * RacaRepository constructor.
         *
         * @param  Raca  $raca
         */
        public function __construct(Raca $raca)
        {
            $this->raca = $raca;
        }


        /**
         * @return Raca[]|Collection
         */
        public function getAll(): Collection
        {
            return $this->raca->get();
        }

        /**
         * @param $id
         *
         * @return Raca[]|Collection
         */
        public function getById($id)
        {
            return $this->raca->where('id', $id)->get();
        }

        /**
         * @param $id
         *
         * @return Raca|null
         */
        public function findById($id): ?Raca
        {
            return $this->raca->find($id);
        }

        /**
         * @param $data
         *
         * @return Raca|null
         */
        public function save($data): ?Raca
        {
            /** @var Raca $model */
            $model = new $this->raca;

            $model->fill($data);
            $model->save();

            return $model->fresh();

        }

        /**
         * @param $data
         * @param $id
         *
         * @return Raca
         */
        public function update($data, $id): Raca
        {
            $model = $this->raca->find($id);
            $model->fill($data);
            $model->update();
            return $model;
        }

        /**
         * @param $id
         *
         * @return Raca
         * @throws Exception
         */
        public function delete($id)
        {
            $model = $this->raca->find($id);
            $model->delete();
            return $model;
        }


    }