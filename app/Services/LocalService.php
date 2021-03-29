<?php


    namespace App\Services;


    use App\Models\Local;
    use App\Repositories\LocalRepository;
    use Exception;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use InvalidArgumentException;
    use Throwable;
    use Validator;

    class LocalService
    {
        protected LocalRepository $localRepository;

        /**
         * LocalService constructor.
         *
         * @param  LocalRepository  $localRepository
         */
        public function __construct(LocalRepository $localRepository)
        {
            $this->localRepository = $localRepository;
        }

        /**
         * @return Local[]|Collection
         */
        public function getAll()
        {
            return $this->localRepository->getAll();
        }

        /**
         * @param $id
         *
         * @return Local|null
         */
        public function findById($id)
        {
            return $this->localRepository->findById($id);
        }

        /**
         * @param $data
         *
         * @return Local|null
         */
        public function saveLocal($data)
        {
            $validator = Validator::make($data, ['descricao' => 'required']);
            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }
            return $this->localRepository->save($data);
        }

        /**
         * @param $data
         * @param $id
         *
         * @return Local
         * @throws Throwable
         */
        public function updateLocal($data, $id)
        {
            $validator = Validator::make($data, ['descricao' => 'required']);

            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            DB::beginTransaction();

            try {
                $model = $this->localRepository->update($data, $id);

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
         * @return Local
         * @throws Throwable
         */
        public function deleteById($id)
        {

            DB::beginTransaction();

            try {
                $model = $this->localRepository->delete($id);

            } catch (Exception $e) {
                DB::rollBack();
                Log::info($e->getMessage());

                throw new InvalidArgumentException('Não foi possível remover o registro');
            }

            DB::commit();

            return $model;
        }

    }