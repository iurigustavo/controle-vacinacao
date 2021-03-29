<?php


    namespace App\Http\Controllers;


    use App\Http\DataTables\Restricoes\RestricoesDataTables;
    use App\Http\Requests\Vacinas\LoteRequest;
    use App\Models\Lote;
    use App\Services\LoteService;
    use Exception;
    use Throwable;

    class LotesController extends Controller
    {
        /**
         * @var LoteService
         */
        protected LoteService $loteService;

        /**
         *
         * @param  LoteService  $loteService
         *
         */
        public function __construct(LoteService $loteService)
        {
            $this->loteService = $loteService;
            $this->titulo      = 'Lotes';
        }


        public function create($vacina_id)
        {
            $model            = new Lote();
            $model->vacina_id = $vacina_id;

            $page_title       = $this->titulo;

            return view('pages.lotes.show', compact('page_title',  'model'));

        }

        public function show($id)
        {
            $model = $this->loteService->findById($id);

            $page_title       = $this->titulo;

            return view('pages.lotes.show', compact('page_title',  'model'));

        }

        public function store(LoteRequest $request, $vacina_id)
        {
            try {
                $lote = $this->loteService->saveLote($request->validated());
            } catch (Exception $e) {
                return redirect()->route('vacinas.lotes.create', $vacina_id)->with('errors', $e->getMessage());
            }

            return redirect()->route('vacinas.show', $vacina_id)->with('success', 'Registro cadastrado com sucesso');

        }

        public function update(LoteRequest $request, $vacina_id, $lote_id)
        {
            try {
                $this->loteService->updateLote($request->validated(), $lote_id);
            } catch (Exception $e) {
                return redirect()->route('vacinas.show', $vacina_id)->with('errors', $e->getMessage());
            } catch (Throwable $e) {
            }

            return redirect()->route('vacinas.show', $vacina_id)->with('success', 'Registro atualizado com sucesso');
        }

        public function destroy($id)
        {
            try {
                $this->loteService->deleteById($id);
                return redirect()->route('lotes.index')->with('success', 'Registro excluído com sucesso!!!');
            } catch (Exception $e) {
                return redirect()->route('lotes.index')->with('errors', 'Erro ao remover o registro');
            } catch (Throwable $e) {
            }
        }

    }
