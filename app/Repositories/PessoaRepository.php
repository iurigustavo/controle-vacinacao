<?php


    namespace App\Repositories;


    use App\Models\Pessoa;
    use Exception;
    use Illuminate\Database\Eloquent\Collection;

    class PessoaRepository
    {
        protected Pessoa $pessoa;

        /**
         * PessoaRepository constructor.
         *
         * @param  Pessoa  $pessoa
         */
        public function __construct(Pessoa $pessoa)
        {
            $this->pessoa = $pessoa;
        }


        /**
         * @return Pessoa[]|Collection
         */
        public function getAll(): Collection
        {
            return $this->pessoa->get();
        }

        /**
         * @param $id
         *
         * @return Pessoa[]|Collection
         */
        public function getById($id)
        {
            return $this->pessoa->where('id', $id)->get();
        }

        /**
         * @param $id
         *
         * @return Pessoa|null
         */
        public function findById($id): ?Pessoa
        {
            return $this->pessoa->find($id);
        }

        /**
         * @param $data
         *
         * @return Pessoa|null
         */
        public function save($data): ?Pessoa
        {
            /** @var Pessoa $model */
            $model = new $this->pessoa;

            $model->fill($data);
            $model->save();

            return $model->fresh();

        }

        /**
         * @param $data
         * @param $id
         *
         * @return Pessoa
         */
        public function update($data, $id): Pessoa
        {
            $model = $this->pessoa->find($id);
            $model->fill($data);
            $model->update();
            return $model;
        }

        /**
         * @param $id
         *
         * @return Pessoa
         * @throws Exception
         */
        public function delete($id)
        {
            $model = $this->pessoa->find($id);
            $model->delete();
            return $model;
        }


    }