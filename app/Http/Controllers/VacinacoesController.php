<?php


    namespace App\Http\Controllers;


    use App\Http\DataTables\Vacinacoes\PessoasVacinacoesCompletoDataTables;
    use App\Http\Requests\Pessoas\PessoasRequest;
    use App\Models\Pessoa;
    use App\Services\CargoService;
    use App\Services\DoseService;
    use App\Services\LocalService;
    use App\Services\PessoaService;
    use App\Services\RacaService;
    use App\Services\VacinacaoService;
    use App\Services\VacinaService;
    use Exception;
    use Illuminate\Http\Request;
    use Throwable;

    class VacinacoesController extends Controller
    {
        /**
         * @var VacinacaoService
         */
        protected VacinacaoService         $vacinacaoService;
        protected CargoService             $cargoService;
        protected LocalService             $localService;
        protected RacaService              $racaService;
        protected PessoaService            $pessoaService;
        protected VacinaService            $vacinaService;
        protected DoseService              $doseService;
        /**
         * @var string
         */
        private string $titulo;
        /**
         * @var array
         */
        private array $estadosBrasileiros;

        /**
         *
         * @param  PessoaService     $pessoaService
         * @param  VacinacaoService  $vacinacaoService
         * @param  CargoService      $cargoService
         * @param  LocalService      $localService
         * @param  RacaService       $racaService
         * @param  VacinaService     $vacinaService
         * @param  DoseService       $doseService
         */
        public function __construct(
            PessoaService $pessoaService,
            VacinacaoService $vacinacaoService,
            CargoService $cargoService,
            LocalService $localService,
            RacaService $racaService,
            VacinaService $vacinaService,
            DoseService $doseService
        ) {
            $this->pessoaService      = $pessoaService;
            $this->vacinacaoService   = $vacinacaoService;
            $this->cargoService       = $cargoService;
            $this->localService       = $localService;
            $this->racaService        = $racaService;
            $this->vacinaService      = $vacinaService;
            $this->doseService        = $doseService;
            $this->titulo             = 'Vacinações';
            $this->estadosBrasileiros = [
                'AC' => 'Acre',
                'AL' => 'Alagoas',
                'AP' => 'Amapá',
                'AM' => 'Amazonas',
                'BA' => 'Bahia',
                'CE' => 'Ceará',
                'DF' => 'Distrito Federal',
                'ES' => 'Espírito Santo',
                'GO' => 'Goiás',
                'MA' => 'Maranhão',
                'MT' => 'Mato Grosso',
                'MS' => 'Mato Grosso do Sul',
                'MG' => 'Minas Gerais',
                'PA' => 'Pará',
                'PB' => 'Paraíba',
                'PR' => 'Paraná',
                'PE' => 'Pernambuco',
                'PI' => 'Piauí',
                'RJ' => 'Rio de Janeiro',
                'RN' => 'Rio Grande do Norte',
                'RS' => 'Rio Grande do Sul',
                'RO' => 'Rondônia',
                'RR' => 'Roraima',
                'SC' => 'Santa Catarina',
                'SP' => 'São Paulo',
                'SE' => 'Sergipe',
                'TO' => 'Tocantins'
            ];

        }


        public function index(PessoasVacinacoesCompletoDataTables $dataTable)
        {
            $page_title          = $this->titulo;
            $this->data['title'] = 'Lista de Vacinações';
            $this->data['new']   = route('vacinacoes.verificar');


            return $dataTable->render('template.datatables', compact('page_title'), ['data' => $this->data]);

        }

        public function verificar()
        {
            $page_title = $this->titulo;
            return view('pages.vacinacoes.verificar', compact('page_title',));
        }

        public function create(Request $request)
        {
            $page_title = $this->titulo;

            // AQUI VOCÊ PODE VERIFICAR EM ALGUMA API DA SUA LOCALIDADE OS DADOS DA PESSOA

            if (Pessoa::where('cpf', $request->input('cpf'))->exists()) {
                return redirect()->route('vacinacoes.verificar')->with('errors', 'CPF já cadastrado');
            }

            $model      = new Pessoa();
            $model->cpf = $request->input('cpf');

            $listaRacas         = $this->racaService->getAll()->pluck('descricao', 'id')->all();
            $estadosBrasileiros = $this->estadosBrasileiros;
            return view('pages.vacinacoes.create', compact('page_title', 'model', 'listaRacas', 'estadosBrasileiros'));

        }

        public function show($id)
        {
            $model = $this->pessoaService->findById($id);

            $page_title       = $this->titulo;
            $page_description = 'edição';


            $listaCargos        = $this->cargoService->getAll()->pluck('descricao', 'id')->all();
            $listaLocais        = $this->localService->getAll()->pluck('descricao', 'id')->all();
            $listaRacas         = $this->racaService->getAll()->pluck('descricao', 'id')->all();
            $listaVacinas       = $this->vacinaService->listVacinasJoinLotesToPluck()->all();
            $listaDoses         = $this->doseService->getAll();
            $estadosBrasileiros = $this->estadosBrasileiros;

            return view('pages.vacinacoes.show',
                compact('page_title', 'page_description', 'model', 'listaDoses', 'listaCargos', 'listaLocais', 'listaVacinas', 'listaRacas', 'estadosBrasileiros'));

        }

        public function store(PessoasRequest $request)
        {
            try {
                $pessoa = $this->pessoaService->savePessoa($request->validated());
            } catch (Exception $e) {
                return redirect()->route('vacinacoes.create')->with('errors', $e->getMessage());
            }

            return redirect()->route('vacinacoes.show', $pessoa->id)->with('success', 'Registro cadastrado com sucesso');

        }

        public function update(PessoasRequest $request, $id)
        {
            try {
                $this->pessoaService->updatePessoa($request->validated(), $id);
            } catch (Exception $e) {
                return redirect()->route('vacinacoes.show', $id)->with('errors', $e->getMessage());
            } catch (Throwable $e) {
            }

            return redirect()->route('vacinacoes.show', $id)->with('success', 'Registro atualizado com sucesso');
        }


    }
