<?php


    namespace App\Http\Controllers;


    use App\Http\Requests\Vacinacoes\VacinacaoDosesRequest;
    use App\Services\PessoaService;
    use App\Services\VacinacaoService;
    use Exception;
    use Throwable;

    class DosesController extends Controller
    {
        /**
         * @var VacinacaoService
         */
        protected VacinacaoService         $vacinacaoService;
        protected PessoaService            $pessoaService;

        /**
         *
         * @param  PessoaService     $pessoaService
         * @param  VacinacaoService  $vacinacaoService
         */
        public function __construct(
            PessoaService $pessoaService,
            VacinacaoService $vacinacaoService
        ) {
            $this->pessoaService    = $pessoaService;
            $this->vacinacaoService = $vacinacaoService;
        }


        public function store(VacinacaoDosesRequest $request, $pessoa_id)
        {
            try {
                $dose = $this->vacinacaoService->saveVacinacao($request->validated());
            } catch (Exception $e) {
                return redirect()->route('vacinacoes.show', $pessoa_id)->with('errors', $e->getMessage());
            }

            return redirect()->route('vacinacoes.show', $pessoa_id)->with('success', 'Registro cadastrado com sucesso');

        }

        public function update(VacinacaoDosesRequest $request, $pessoa_id, $dose_id)
        {
            try {
                $this->vacinacaoService->updateVacinacao($request->validated(), $dose_id);
            } catch (Exception $e) {
                return redirect()->route('vacinacoes.show', $pessoa_id)->with('errors', $e->getMessage());
            } catch (Throwable $e) {
            }

            return redirect()->route('vacinacoes.show', $pessoa_id)->with('success', 'Registro atualizado com sucesso');
        }


    }
