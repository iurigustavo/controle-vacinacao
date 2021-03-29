<?php


    namespace App\Services;


    use App\Http\Requests\Pessoas\PessoasRequest;
    use App\Models\Pessoa;
    use App\Repositories\PessoaRepository;
    use Exception;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use InvalidArgumentException;
    use Throwable;
    use Validator;

    class PessoaService
    {
        protected PessoaRepository $pessoaRepository;

        /**
         * PessoaService constructor.
         *
         * @param  PessoaRepository  $pessoaRepository
         */
        public function __construct(PessoaRepository $pessoaRepository)
        {
            $this->pessoaRepository = $pessoaRepository;
        }

        /**
         * @return Pessoa[]|Collection
         */
        public function getAll()
        {
            return $this->pessoaRepository->getAll();
        }

        /**
         * @param $id
         *
         * @return Pessoa|null
         */
        public function findById($id)
        {
            return $this->pessoaRepository->findById($id);
        }

        /**
         * @param $data
         *
         * @return Pessoa|null
         */
        public function savePessoa($data)
        {
            if (Pessoa::where('cpf', $data['cpf'])->exists()) {
                throw new InvalidArgumentException('CPF já cadastrado.');
            }
            $rules     = new PessoasRequest();
            $validator = Validator::make($data,$rules->rules());
            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }
            return $this->pessoaRepository->save($data);
        }

        /**
         * @param $data
         * @param $id
         *
         * @return Pessoa
         * @throws Throwable
         */
        public function updatePessoa($data, $id)
        {

            $rules     = new PessoasRequest();
            $validator = Validator::make($data,$rules->rules());

            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            DB::beginTransaction();

            try {
                $model = $this->pessoaRepository->update($data, $id);

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
         * @return Pessoa
         * @throws Throwable
         */
        public function deleteById($id)
        {

            DB::beginTransaction();

            try {
                $model = $this->pessoaRepository->delete($id);

            } catch (Exception $e) {
                DB::rollBack();
                Log::info($e->getMessage());

                throw new InvalidArgumentException('Não foi possível remover o registro');
            }

            DB::commit();

            return $model;
        }

    }