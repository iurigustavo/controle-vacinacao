<?php


    namespace App\Services;


    use App\Models\Vacinacao;
    use App\Models\viewPessoasVacinacao;
    use App\Repositories\VacinacaoRepository;
    use Exception;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use InvalidArgumentException;
    use Throwable;

    class VacinacaoService
    {
        protected VacinacaoRepository $vacinacaoRepository;

        /**
         * VacinacaoService constructor.
         *
         * @param  VacinacaoRepository  $vacinacaoRepository
         */
        public function __construct(VacinacaoRepository $vacinacaoRepository)
        {
            $this->vacinacaoRepository = $vacinacaoRepository;
        }

        /**
         * @return Vacinacao[]|Collection
         */
        public function getAll()
        {
            return $this->vacinacaoRepository->getAll();
        }

        /**
         * @param $id
         *
         * @return Vacinacao|null
         */
        public function findById($id)
        {
            return $this->vacinacaoRepository->findById($id);
        }

        /**
         * @param $data
         *
         * @return Vacinacao|null
         */
        public function saveVacinacao($data)
        {
            if (Vacinacao::query()->where('pessoa_id', $data['pessoa_id'])->where('dose_id', $data['dose_id'])->exists()) {
                throw new InvalidArgumentException('Pessoa já foi vacinada com essa dose');
            }

            return $this->vacinacaoRepository->save($data);
        }

        /**
         * @param $data
         * @param $id
         *
         * @return Vacinacao
         * @throws Throwable
         */
        public function updateVacinacao($data, $id)
        {

            DB::beginTransaction();

            try {
                $model = $this->vacinacaoRepository->update($data, $id);

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
         * @return Vacinacao
         * @throws Throwable
         */
        public function deleteById($id)
        {

            DB::beginTransaction();

            try {
                $model = $this->vacinacaoRepository->delete($id);

            } catch (Exception $e) {
                DB::rollBack();
                Log::info($e->getMessage());

                throw new InvalidArgumentException('Não foi possível remover o registro');
            }

            DB::commit();

            return $model;
        }

        public function listVacinacaoPelaData($data_inicio, $data_fim)
        {
            return viewPessoasVacinacao::selectRaw('p.cpf cpf,p.nome nome,p.cns cns,DATE_FORMAT(p.data_nascimento,\'%d/%m/%Y\') datnasc,DATE_FORMAT(v1_data,\'%d/%m/%Y\') prim_dose,v1_cargo cargo_prim_dose, v1_local local_prim_dose,
       DATE_FORMAT(v2_data,\'%d/%m/%Y\') seg_dose, v2_cargo cargo_seg_dose, v2_local local_seg_dose')
                                       ->leftJoin('pessoas as p', 'p.id', '=', 'uvw_pessoas_vacinacao.id')
                                       ->whereBetween('v1_data', [$data_inicio, $data_fim])
                                       ->orWhereBetween('v2_data', [$data_inicio, $data_fim])
                                       ->orderBy('v1_cargo', 'asc');

        }

    }