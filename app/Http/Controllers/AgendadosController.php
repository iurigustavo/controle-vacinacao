<?php


    namespace App\Http\Controllers;


    use App\Http\DataTables\Agendas\AgendadosDataTables;
    use App\Models\Agendado;
    use App\Models\Local;
    use Illuminate\Http\Request;

    class AgendadosController extends Controller
    {

        private string $titulo;

        public function __construct()
        {
            $this->titulo = 'Agendados';
        }


        public function index(AgendadosDataTables $dataTable, Request $request)
        {
            $page_title          = $this->titulo;
            $this->data['title'] = 'Lista dos Agendados';

            $listaDatas  = Agendado::select('data')->orderBy('data', 'desc')->groupBy('data')->get();
            $listaLocais = Local::all();

            return $dataTable->render('pages.agendados.index', compact('page_title', 'listaDatas', 'listaLocais'), ['data' => $this->data]);

        }


        public function show(Agendado $agendado)
        {

            return view('pages.agendados.show', [
                'page_title'  => $this->titulo,
                'agendamento' => $agendado,
            ]);

        }

        public function compareceu(Agendado $agendado, $sit)
        {
            $agendado->compareceu = $sit;
            $agendado->save();
            return redirect()->route('agendados.show', ['agendado' => $agendado->id])->with('success', 'Situação alterada');
        }

        public function aplicardose(Agendado $agendado)
        {
            $agendado->compareceu = 1;
            $agendado->save();
            return redirect()->route('vacinacoes.show', $agendado->pessoa_id);

        }


    }
