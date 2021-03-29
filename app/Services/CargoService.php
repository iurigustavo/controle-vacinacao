<?php


    namespace App\Services;


    use App\Http\Requests\Cargos\CargoRequest;
    use App\Models\Cargo;
    use App\Repositories\CargoRepository;
    use Exception;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use InvalidArgumentException;
    use Throwable;
    use Validator;

    class CargoService
    {
        protected CargoRepository $cargoRepository;

        /**
         * CargoService constructor.
         *
         * @param  CargoRepository  $cargoRepository
         */
        public function __construct(CargoRepository $cargoRepository)
        {
            $this->cargoRepository = $cargoRepository;
        }

        /**
         * @return Cargo[]|Collection
         */
        public function getAll()
        {
            return $this->cargoRepository->getAll();
        }

        /**
         * @param $id
         *
         * @return Cargo|null
         */
        public function findById($id)
        {
            return $this->cargoRepository->findById($id);
        }

        /**
         * @param $data
         *
         * @return Cargo|null
         */
        public function saveCargo($data)
        {
            $rules     = new CargoRequest();
            $validator = Validator::make($data, $rules->rules());
            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }
            return $this->cargoRepository->save($data);
        }

        /**
         * @param $data
         * @param $id
         *
         * @return Cargo
         * @throws Throwable
         */
        public function updateCargo($data, $id)
        {
            $rules     = new CargoRequest();
            $validator = Validator::make($data, $rules->rules());

            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            DB::beginTransaction();

            try {
                $model = $this->cargoRepository->update($data, $id);

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
         * @return Cargo
         * @throws Throwable
         */
        public function deleteById($id)
        {

            DB::beginTransaction();

            try {
                $model = $this->cargoRepository->delete($id);

            } catch (Exception $e) {
                DB::rollBack();
                Log::info($e->getMessage());

                throw new InvalidArgumentException('Não foi possível remover o registro');
            }

            DB::commit();

            return $model;
        }

    }