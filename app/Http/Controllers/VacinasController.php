<?php


    namespace App\Http\Controllers;


    use App\Http\DataTables\Vacinas\VacinasDataTables;
    use App\Http\DataTables\Restricoes\RestricoesDataTables;
    use App\Http\Requests\Vacinas\VacinaRequest;
    use App\Models\Vacina;
    use App\Services\VacinaService;
    use Exception;
    use Throwable;

    class VacinasController extends Controller
    {
        /**
         * @var VacinaService
         */
        protected VacinaService $vacinaService;
        /**
         * @var string
         */
        private string $titulo;

        /**
         *
         * @param  VacinaService  $vacinaService
         *
         */
        public function __construct(VacinaService $vacinaService)
        {
            $this->vacinaService = $vacinaService;
            $this->titulo       = 'Vacinas';
        }


        public function index(VacinasDataTables $dataTable)
        {
            $page_title             = $this->titulo;
            $this->data['title']    = 'Lista de Vacinas';
            $this->data['new']      = route('vacinas.create');


            return $dataTable->render('template.datatables', compact('page_title'), ['data' => $this->data]);

        }

        public function create()
        {
            $model = new Vacina();

            $page_title       = $this->titulo;

            return view('pages.vacinas.create', compact('page_title',  'model'));

        }

        public function show($id)
        {
            $model = $this->vacinaService->findById($id);

            $page_title       = $this->titulo;

            return view('pages.vacinas.show', compact('page_title',  'model'));

        }

        public function store(VacinaRequest $request)
        {
            try {
                $vacina = $this->vacinaService->saveVacina($request->validated());
            } catch (Exception $e) {
                return redirect()->route('vacinas.create')->with('errors', $e->getMessage());
            }

            return redirect()->route('vacinas.show',$vacina->id)->with('success', 'Registro cadastrado com sucesso');

        }

        public function update(VacinaRequest $request, $id)
        {
            try {
                $this->vacinaService->updateVacina($request->validated(), $id);
            } catch (Exception $e) {
                return redirect()->route('vacinas.show', $id)->with('errors', $e->getMessage());
            } catch (Throwable $e) {
            }

            return redirect()->route('vacinas.index')->with('success', 'Registro atualizado com sucesso');
        }

        public function destroy($id)
        {
            try {
                $this->vacinaService->deleteById($id);
                return redirect()->route('vacinas.index')->with('success', 'Registro excluído com sucesso!!!');
            } catch (Exception $e) {
                return redirect()->route('vacinas.index')->with('errors', 'Erro ao remover o registro');
            } catch (Throwable $e) {
            }
        }

    }
