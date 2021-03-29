<?php


    namespace App\Http\Controllers;


    use App\Http\DataTables\Cargos\CargosDataTables;
    use App\Http\DataTables\Restricoes\RestricoesDataTables;
    use App\Http\Requests\Cargos\CargoRequest;
    use App\Models\Cargo;
    use App\Services\CargoService;
    use Exception;
    use Throwable;

    class CargosController extends Controller
    {
        /**
         * @var CargoService
         */
        protected CargoService $cargoService;
        /**
         * @var string
         */
        private string $titulo;

        /**
         *
         * @param  CargoService  $cargoService
         *
         */
        public function __construct(CargoService $cargoService)
        {
            $this->cargoService = $cargoService;
            $this->titulo       = 'Cargos';
        }


        public function index(CargosDataTables $dataTable)
        {
            $page_title             = $this->titulo;
            $this->data['title']    = 'Lista de Cargos';
            $this->data['new']      = route('cargos.create');


            return $dataTable->render('template.datatables', compact('page_title'), ['data' => $this->data]);

        }

        public function create()
        {
            $model = new Cargo();

            $page_title       = $this->titulo;

            return view('pages.cargos.show', compact('page_title',  'model'));

        }

        public function show($id)
        {
            $model = $this->cargoService->findById($id);

            $page_title       = $this->titulo;

            return view('pages.cargos.show', compact('page_title',  'model'));

        }

        public function store(CargoRequest $request)
        {
            try {
                $cargo = $this->cargoService->saveCargo($request->validated());
            } catch (Exception $e) {
                return redirect()->route('cargos.create')->with('errors', $e->getMessage());
            }

            return redirect()->route('cargos.index')->with('success', 'Registro cadastrado com sucesso');

        }

        public function update(CargoRequest $request, $id)
        {
            try {
                $this->cargoService->updateCargo($request->validated(), $id);
            } catch (Exception $e) {
                return redirect()->route('cargos.show', $id)->with('errors', $e->getMessage());
            } catch (Throwable $e) {
            }

            return redirect()->route('cargos.index')->with('success', 'Registro atualizado com sucesso');
        }

        public function destroy($id)
        {
            try {
                $this->cargoService->deleteById($id);
                return redirect()->route('cargos.index')->with('success', 'Registro excluído com sucesso!!!');
            } catch (Exception $e) {
                return redirect()->route('cargos.index')->with('errors', 'Erro ao remover o registro');
            } catch (Throwable $e) {
            }
        }

    }
