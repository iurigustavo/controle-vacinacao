<?php


    namespace App\Http\Controllers;


    use App\Http\DataTables\Locais\LocaisDataTables;
    use App\Http\Requests\Locais\LocalRequest;
    use App\Models\Local;
    use App\Services\LocalService;
    use Exception;
    use Throwable;

    class LocaisController extends Controller
    {
        /**
         * @var LocalService
         */
        protected LocalService $localService;
        /**
         * @var string
         */
        private string $titulo;

        /**
         *
         * @param  LocalService  $localService
         *
         */
        public function __construct(LocalService $localService)
        {
            $this->localService = $localService;
            $this->titulo       = 'Locais';
        }


        public function index(LocaisDataTables $dataTable)
        {
            $page_title             = $this->titulo;
            $this->data['title']    = 'Lista de Locais';
            $this->data['new']      = route('locais.create');


            return $dataTable->render('template.datatables', compact('page_title'), ['data' => $this->data]);

        }

        public function create()
        {
            $model = new Local();

            $page_title       = $this->titulo;

            return view('pages.locais.show', compact('page_title',  'model'));

        }

        public function show($id)
        {
            $model = $this->localService->findById($id);

            $page_title       = $this->titulo;

            return view('pages.locais.show', compact('page_title',  'model'));

        }

        public function store(LocalRequest $request)
        {
            try {
                $usuario = $this->localService->saveLocal($request->validated());
            } catch (Exception $e) {
                return redirect()->route('locais.create')->with('errors', $e->getMessage());
            }

            return redirect()->route('locais.index')->with('success', 'Registro cadastrado com sucesso');

        }

        public function update(LocalRequest $request, $id)
        {
            try {
                $this->localService->updateLocal($request->validated(), $id);
            } catch (Exception $e) {
                return redirect()->route('locais.show', $id)->with('errors', $e->getMessage());
            } catch (Throwable $e) {
            }

            return redirect()->route('locais.index')->with('success', 'Registro atualizado com sucesso');
        }

        public function destroy($id)
        {
            try {
                $this->localService->deleteById($id);
                return redirect()->route('locais.index')->with('success', 'Registro excluído com sucesso!!!');
            } catch (Exception $e) {
                return redirect()->route('locais.index')->with('errors', 'Erro ao remover o registro');
            } catch (Throwable $e) {
            }
        }

    }
