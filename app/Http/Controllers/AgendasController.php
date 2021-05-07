<?php


    namespace App\Http\Controllers;


    use App\Actions\Agendas\CreateAgenda;
    use App\Actions\Agendas\DeleteAgenda;
    use App\Actions\Agendas\UpdateAgenda;
    use App\Http\DataTables\Agendas\AgendasDataTables;
    use App\Http\Requests\Agenda\AgendaRequest;
    use App\Models\Agenda;
    use App\Models\Local;
    use Exception;

    class AgendasController extends Controller
    {

        private string $titulo;

        public function __construct()
        {
            $this->titulo = 'Agendas';
        }


        public function index(AgendasDataTables $dataTable)
        {
            $page_title          = $this->titulo;
            $this->data['title'] = 'Lista de Agendas';
            $this->data['new']   = route('agendas.create');


            return $dataTable->render('template.datatables', compact('page_title'), ['data' => $this->data]);

        }

        public function create()
        {
            $model = new Agenda();

            $page_title  = $this->titulo;
            $listaLocais = Local::get()->pluck('descricao', 'id')->all();

            return view('pages.agendas.show', compact('page_title', 'model', 'listaLocais'));

        }

        public function show(Agenda $agenda)
        {

            return view('pages.agendas.show', [
                'page_title'  => $this->titulo,
                'model'       => $agenda,
                'listaLocais' => Local::get()->pluck('descricao', 'id')->all()
            ]);

        }

        public function store(AgendaRequest $request)
        {
            $agenda = $this->dispatchNow(CreateAgenda::fromRequest($request));

            return redirect()->route('agendas.index')->with('success', 'Registro cadastrado com sucesso');

        }

        public function update(AgendaRequest $request, Agenda $agenda)
        {
            $agenda = $this->dispatchNow(UpdateAgenda::fromRequest($agenda, $request));

            return redirect()->route('agendas.index')->with('success', 'Registro atualizado com sucesso');
        }

        public function destroy(Agenda $agenda)
        {
            try {
                $this->dispatchNow(new DeleteAgenda($agenda));
                return redirect()->route('agenda.index')->with('success', 'Registro excluído com sucesso!!!');
            } catch (Exception $exception) {
                return redirect()->route('agenda.index')->with('errors', 'Erro ao remover o registro');
            }
        }

    }
