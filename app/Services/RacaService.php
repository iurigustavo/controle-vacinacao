<?php


    namespace App\Services;


    use App\Http\Requests\Racas\RacaRequest;
    use App\Models\Raca;
    use App\Repositories\RacaRepository;
    use Exception;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use InvalidArgumentException;
    use Throwable;
    use Validator;

    class RacaService
    {
        protected RacaRepository $racaRepository;

        /**
         * RacaService constructor.
         *
         * @param  RacaRepository  $racaRepository
         */
        public function __construct(RacaRepository $racaRepository)
        {
            $this->racaRepository = $racaRepository;
        }

        /**
         * @return Raca[]|Collection
         */
        public function getAll()
        {
            return $this->racaRepository->getAll();
        }

        /**
         * @param $id
         *
         * @return Raca|null
         */
        public function findById($id)
        {
            return $this->racaRepository->findById($id);
        }

        /**
         * @param $data
         *
         * @return Raca|null
         */
        public function saveRaca($data)
        {
            $rules     = new RacaRequest();
            $validator = Validator::make($data, $rules->rules());
            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }
            return $this->racaRepository->save($data);
        }

        /**
         * @param $data
         * @param $id
         *
         * @return Raca
         * @throws Throwable
         */
        public function updateRaca($data, $id)
        {
            $rules     = new RacaRequest();
            $validator = Validator::make($data, $rules->rules());

            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            DB::beginTransaction();

            try {
                $model = $this->racaRepository->update($data, $id);

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
         * @return Raca
         * @throws Throwable
         */
        public function deleteById($id)
        {

            DB::beginTransaction();

            try {
                $model = $this->racaRepository->delete($id);

            } catch (Exception $e) {
                DB::rollBack();
                Log::info($e->getMessage());

                throw new InvalidArgumentException('Não foi possível remover o registro');
            }

            DB::commit();

            return $model;
        }

    }