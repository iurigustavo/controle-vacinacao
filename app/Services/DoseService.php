<?php


    namespace App\Services;


    use App\Models\Dose;
    use App\Repositories\DoseRepository;
    use Exception;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use InvalidArgumentException;
    use Throwable;
    use Validator;

    class DoseService
    {
        protected DoseRepository $doseRepository;

        /**
         * DoseService constructor.
         *
         * @param  DoseRepository  $doseRepository
         */
        public function __construct(DoseRepository $doseRepository)
        {
            $this->doseRepository = $doseRepository;
        }

        /**
         * @return Dose[]|Collection
         */
        public function getAll()
        {
            return $this->doseRepository->getAll();
        }

        /**
         * @param $id
         *
         * @return Dose|null
         */
        public function findById($id)
        {
            return $this->doseRepository->findById($id);
        }

        /**
         * @param $data
         *
         * @return Dose|null
         */
        public function saveDose($data)
        {
            $validator = Validator::make($data,
                ['descricao' => 'required']);
            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }
            return $this->doseRepository->save($data);
        }

        /**
         * @param $data
         * @param $id
         *
         * @return Dose
         * @throws Throwable
         */
        public function updateDose($data, $id)
        {
            $validator = Validator::make($data,
                ['descricao' => 'required']);

            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            DB::beginTransaction();

            try {
                $model = $this->doseRepository->update($data, $id);

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
         * @return Dose
         * @throws Throwable
         */
        public function deleteById($id)
        {

            DB::beginTransaction();

            try {
                $model = $this->doseRepository->delete($id);

            } catch (Exception $e) {
                DB::rollBack();
                Log::info($e->getMessage());

                throw new InvalidArgumentException('Não foi possível remover o registro');
            }

            DB::commit();

            return $model;
        }

    }