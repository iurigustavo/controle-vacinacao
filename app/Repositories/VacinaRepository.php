<?php


    namespace App\Repositories;


    use App\Models\Vacina;
    use Exception;
    use Illuminate\Database\Eloquent\Collection;

    class VacinaRepository
    {
        protected Vacina $vacina;

        /**
         * VacinaRepository constructor.
         *
         * @param  Vacina  $vacina
         */
        public function __construct(Vacina $vacina)
        {
            $this->vacina = $vacina;
        }


        /**
         * @return Vacina[]|Collection
         */
        public function getAll(): Collection
        {
            return $this->vacina->get();
        }

        /**
         * @param $id
         *
         * @return Vacina[]|Collection
         */
        public function getById($id)
        {
            return $this->vacina->where('id', $id)->get();
        }

        /**
         * @param $id
         *
         * @return Vacina|null
         */
        public function findById($id): ?Vacina
        {
            return $this->vacina->find($id);
        }

        /**
         * @param $data
         *
         * @return Vacina|null
         */
        public function save($data): ?Vacina
        {
            /** @var Vacina $model */
            $model = new $this->vacina;

            $model->fill($data);
            $model->save();

            return $model->fresh();

        }

        /**
         * @param $data
         * @param $id
         *
         * @return Vacina
         */
        public function update($data, $id): Vacina
        {
            $model = $this->vacina->find($id);
            $model->fill($data);
            $model->update();
            return $model;
        }

        /**
         * @param $id
         *
         * @return Vacina
         * @throws Exception
         */
        public function delete($id)
        {
            $model = $this->vacina->find($id);
            $model->delete();
            return $model;
        }


    }