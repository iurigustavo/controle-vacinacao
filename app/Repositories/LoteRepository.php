<?php


    namespace App\Repositories;


    use App\Models\Lote;
    use Exception;
    use Illuminate\Database\Eloquent\Collection;

    class LoteRepository
    {
        protected Lote $lote;

        /**
         * LoteRepository constructor.
         *
         * @param  Lote  $lote
         */
        public function __construct(Lote $lote)
        {
            $this->lote = $lote;
        }


        /**
         * @return Lote[]|Collection
         */
        public function getAll(): Collection
        {
            return $this->lote->get();
        }

        /**
         * @param $id
         *
         * @return Lote[]|Collection
         */
        public function getById($id)
        {
            return $this->lote->where('id', $id)->get();
        }

        /**
         * @param $id
         *
         * @return Lote|null
         */
        public function findById($id): ?Lote
        {
            return $this->lote->find($id);
        }

        /**
         * @param $data
         *
         * @return Lote|null
         */
        public function save($data): ?Lote
        {
            /** @var Lote $model */
            $model = new $this->lote;

            $model->fill($data);
            $model->save();

            return $model->fresh();

        }

        /**
         * @param $data
         * @param $id
         *
         * @return Lote
         */
        public function update($data, $id): Lote
        {
            $model = $this->lote->find($id);
            $model->fill($data);
            $model->update();
            return $model;
        }

        /**
         * @param $id
         *
         * @return Lote
         * @throws Exception
         */
        public function delete($id)
        {
            $model = $this->lote->find($id);
            $model->delete();
            return $model;
        }


    }