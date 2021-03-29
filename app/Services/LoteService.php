<?php


    namespace App\Services;


    use App\Http\Requests\Vacinas\LoteRequest;
    use App\Models\Lote;
    use App\Repositories\LoteRepository;
    use Exception;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use InvalidArgumentException;
    use Throwable;
    use Validator;

    class LoteService
    {
        protected LoteRepository $loteRepository;

        /**
         * LoteService constructor.
         *
         * @param  LoteRepository  $loteRepository
         */
        public function __construct(LoteRepository $loteRepository)
        {
            $this->loteRepository = $loteRepository;
        }

        /**
         * @return Lote[]|Collection
         */
        public function getAll()
        {
            return $this->loteRepository->getAll();
        }

        /**
         * @param $id
         *
         * @return Lote|null
         */
        public function findById($id)
        {
            return $this->loteRepository->findById($id);
        }

        /**
         * @param $data
         *
         * @return Lote|null
         */
        public function saveLote($data)
        {
            $rule = new LoteRequest();
            $validator = Validator::make($data, $rule->rules());
            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }
            return $this->loteRepository->save($data);
        }

        /**
         * @param $data
         * @param $id
         *
         * @return Lote
         * @throws Throwable
         */
        public function updateLote($data, $id)
        {
            $rule = new LoteRequest();
            $validator = Validator::make($data, $rule->rules());

            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            DB::beginTransaction();

            try {
                $model = $this->loteRepository->update($data, $id);

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
         * @return Lote
         * @throws Throwable
         */
        public function deleteById($id)
        {

            DB::beginTransaction();

            try {
                $model = $this->loteRepository->delete($id);

            } catch (Exception $e) {
                DB::rollBack();
                Log::info($e->getMessage());

                throw new InvalidArgumentException('Não foi possível remover o registro');
            }

            DB::commit();

            return $model;
        }

    }