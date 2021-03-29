<?php


    namespace App\Repositories;


    use App\Models\Vacinacao;
    use Exception;
    use Illuminate\Database\Eloquent\Collection;

    class VacinacaoRepository
    {
        protected Vacinacao $vacinacao;

        /**
         * VacinacaoRepository constructor.
         *
         * @param  Vacinacao  $vacinacao
         */
        public function __construct(Vacinacao $vacinacao)
        {
            $this->vacinacao = $vacinacao;
        }


        /**
         * @return Vacinacao[]|Collection
         */
        public function getAll(): Collection
        {
            return $this->vacinacao->get();
        }

        /**
         * @param $id
         *
         * @return Vacinacao[]|Collection
         */
        public function getById($id)
        {
            return $this->vacinacao->where('id', $id)->get();
        }

        /**
         * @param $id
         *
         * @return Vacinacao|null
         */
        public function findById($id): ?Vacinacao
        {
            return $this->vacinacao->find($id);
        }

        /**
         * @param $data
         *
         * @return Vacinacao|null
         */
        public function save($data): ?Vacinacao
        {
            /** @var Vacinacao $model */
            $model = new $this->vacinacao;

            $model->fill($data);
            $model->save();

            return $model->fresh();

        }

        /**
         * @param $data
         * @param $id
         *
         * @return Vacinacao
         */
        public function update($data, $id): Vacinacao
        {
            $model = $this->vacinacao->find($id);
            $model->fill($data);
            $model->update();
            return $model;
        }

        /**
         * @param $id
         *
         * @return Vacinacao
         * @throws Exception
         */
        public function delete($id)
        {
            $model = $this->vacinacao->find($id);
            $model->delete();
            return $model;
        }


    }