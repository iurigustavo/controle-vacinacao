<?php


    namespace App\Services;


    use App\Http\Requests\Vacinas\VacinaRequest;
    use App\Models\Vacina;
    use App\Repositories\VacinaRepository;
    use Exception;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use InvalidArgumentException;
    use Throwable;
    use Validator;

    class VacinaService
    {
        protected VacinaRepository $vacinaRepository;

        /**
         * VacinaService constructor.
         *
         * @param  VacinaRepository  $vacinaRepository
         */
        public function __construct(VacinaRepository $vacinaRepository)
        {
            $this->vacinaRepository = $vacinaRepository;
        }

        /**
         * @return Vacina[]|Collection
         */
        public function getAll()
        {
            return $this->vacinaRepository->getAll();
        }

        /**
         * @param $id
         *
         * @return Vacina|null
         */
        public function findById($id)
        {
            return $this->vacinaRepository->findById($id);
        }

        /**
         * @param $data
         *
         * @return Vacina|null
         */
        public function saveVacina($data)
        {
            $rules     = new VacinaRequest();
            $validator = Validator::make($data, $rules->rules());
            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }
            return $this->vacinaRepository->save($data);
        }

        /**
         * @param $data
         * @param $id
         *
         * @return Vacina
         * @throws Throwable
         */
        public function updateVacina($data, $id)
        {
            $rules     = new VacinaRequest();
            $validator = Validator::make($data, $rules->rules());

            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            DB::beginTransaction();

            try {
                $model = $this->vacinaRepository->update($data, $id);

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
         * @return Vacina
         * @throws Throwable
         */
        public function deleteById($id)
        {

            DB::beginTransaction();

            try {
                $model = $this->vacinaRepository->delete($id);

            } catch (Exception $e) {
                DB::rollBack();
                Log::info($e->getMessage());

                throw new InvalidArgumentException('Não foi possível remover o registro');
            }

            DB::commit();

            return $model;
        }

        /**
         * @return \Illuminate\Support\Collection
         */
        public function listVacinasJoinLotesToPluck()
        {
            return Vacina::select('lotes.id as id', DB::raw("CONCAT(vacinas.descricao,' - ', lotes.descricao) as descricao"))
                         ->leftJoin('lotes', 'lotes.vacina_id', '=', 'vacinas.id')
                         ->pluck('descricao', 'id');
        }

    }