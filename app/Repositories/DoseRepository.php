<?php


    namespace App\Repositories;


    use App\Models\Dose;
    use Exception;
    use Illuminate\Database\Eloquent\Collection;

    class DoseRepository
    {
        protected Dose $dose;

        /**
         * DoseRepository constructor.
         *
         * @param  Dose  $dose
         */
        public function __construct(Dose $dose)
        {
            $this->dose = $dose;
        }


        /**
         * @return Dose[]|Collection
         */
        public function getAll(): Collection
        {
            return $this->dose->get();
        }

        /**
         * @param $id
         *
         * @return Dose[]|Collection
         */
        public function getById($id)
        {
            return $this->dose->where('id', $id)->get();
        }

        /**
         * @param $id
         *
         * @return Dose|null
         */
        public function findById($id): ?Dose
        {
            return $this->dose->find($id);
        }

        /**
         * @param $data
         *
         * @return Dose|null
         */
        public function save($data): ?Dose
        {
            /** @var Dose $model */
            $model = new $this->dose;

            $model->fill($data);
            $model->save();

            return $model->fresh();

        }

        /**
         * @param $data
         * @param $id
         *
         * @return Dose
         */
        public function update($data, $id): Dose
        {
            $model = $this->dose->find($id);
            $model->fill($data);
            $model->update();
            return $model;
        }

        /**
         * @param $id
         *
         * @return Dose
         * @throws Exception
         */
        public function delete($id)
        {
            $model = $this->dose->find($id);
            $model->delete();
            return $model;
        }


    }