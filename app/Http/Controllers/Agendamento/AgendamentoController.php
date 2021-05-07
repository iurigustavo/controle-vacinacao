<?php


    namespace App\Http\Controllers\Agendamento;


    use App\Http\Controllers\Controller;
    use App\Http\Requests\Agendamento\DadosPessoaisRequest;
    use App\Http\Requests\Agendamento\DataPeriodoRequest;
    use App\Http\Requests\Agendamento\LocalRequest;
    use App\Models\Agenda;
    use App\Models\Agendado;
    use App\Models\Local;
    use App\Models\Pessoa;

    class AgendamentoController extends Controller
    {
        private Agenda $agenda;

        /**
         * AgendamentoController constructor.
         *
         * @param  \App\Models\Agenda  $agenda
         */
        public function __construct(Agenda $agenda)
        {
            $this->agenda = $agenda;
        }


        public function index()
        {
            session()->flush();
            return view('pages.agendamento.index', ['agenda' => $this->agenda]);
        }

        public function passo1()
        {

            if (!$this->agenda->podeAgendar()) {
                return redirect()->route('agendamento.index')->withErrors('Ainda não há dispobilidade para agendamento');
            }
            return view('pages.agendamento.passo-1-dados-pessoais');
        }

        public function validaPasso1(DadosPessoaisRequest $request)
        {
            $pessoa = Pessoa::whereCpf($request->cpf)->firstOrNew();
            $pessoa->fill($request->all());
            $session           = [];
            $session['pessoa'] = $pessoa;
            session()->put('agendamento', $session);

            return redirect()->route('agendamento.localidade');
        }

        public function passo2()
        {
            if (!session()->has('agendamento')) {
                return redirect()->route('agendamento.index')->withErrors('A sessão expirou');
            }
            if (!$this->agenda->podeAgendar()) {
                return redirect()->route('agendamento.index')->withErrors('Ainda não há dispobilidade para agendamento');
            }
            $listaLocais = $this->agenda->listaLocalidadesDisponiveis();

            if (sizeof($listaLocais) == 0) {
                return redirect()->route('agendamento.index')->withErrors('Ainda não há dispobilidade para agendamento');
            }

            $session = session()->get('agendamento');
            $pessoa  = $session['pessoa'];

            return view('pages.agendamento.passo-2-localidade', compact('listaLocais', 'pessoa'));
        }

        public function validaPasso2(LocalRequest $request)
        {
            if (!session()->has('agendamento')) {
                return redirect()->route('agendamento.index')->withErrors('A sessão expirou');
            }
            if (!$this->agenda->podeAgendar()) {
                return redirect()->route('agendamento.index')->withErrors('Ainda não há dispobilidade para agendamento');
            }

            $local = Local::findOrFail($request->local_id);
            if (($local->total_vagas - $local->total_vagas_preenchidas) === 0) {
                return redirect()->route('agendamento.localidade')->withErrors('Esse local não há dispobilidade para agendamento');
            }

            $session          = session()->get('agendamento');
            $session['local'] = $local;
            session()->put('agendamento', $session);

            return redirect()->route('agendamento.dataPeriodo');
        }

        public function passo3()
        {
            if (!session()->has('agendamento')) {
                return redirect()->route('agendamento.index')->withErrors('A sessão expirou');
            }
            $session = session()->get('agendamento');

            /** @var Pessoa $pessoa */
            $pessoa = $session['pessoa'];
            /** @var Local $local */
            $local = $session['local'];

            if (!$this->agenda->podeAgendar()) {
                return redirect()->route('agendamento.index')->withErrors('Ainda não há dispobilidade para agendamento');
            }

            if (($local->total_vagas - $local->total_vagas_preenchidas) === 0) {
                return redirect()->route('agendamento.localidade')->withErrors('Esse local não há dispobilidade para agendamento');
            }


            return view('pages.agendamento.passo-3-data-periodo', compact('local', 'pessoa'));
        }

        public function validaPasso3(DataPeriodoRequest $request)
        {
            if (!session()->has('agendamento')) {
                return redirect()->route('agendamento.index')->withErrors('A sessão expirou');
            }
            $session = session()->get('agendamento');

            /** @var Pessoa $pessoa */
            $pessoa = $session['pessoa'];
            /** @var Local $local */
            $local = $session['local'];

            if (!$this->agenda->podeAgendar()) {
                return redirect()->route('agendamento.index')->withErrors('Ainda não há dispobilidade para agendamento');
            }

            if (($local->total_vagas - $local->total_vagas_preenchidas) === 0) {
                return redirect()->route('agendamento.localidade')->withErrors('Esse local não há dispobilidade para agendamento');
            }

            $agenda = Agenda::findOrFail($request->agenda_id);


            if ($pessoa->getIdade() < $agenda->faixa_etaria_min) {
                return redirect()->route('agendamento.dataPeriodo')->withErrors('Você não tem idade permitida para esse período');
            }

            if (!$agenda->tem_vaga) {
                return redirect()->route('agendamento.dataPeriodo')->withErrors('Esse período não há dispobilidade para agendamento');
            }


            $session['agenda'] = $agenda;

            session()->put('agendamento', $session);

            return redirect()->route('agendamento.confirmacao');
        }

        public function passo4()
        {
            if (!session()->has('agendamento')) {
                return redirect()->route('agendamento.index')->withErrors('A sessão expirou');
            }
            $session = session()->get('agendamento');

            /** @var Pessoa $pessoa */
            $pessoa = $session['pessoa'];
            /** @var Local $local */
            $local = $session['local'];
            /** @var Agenda $agenda */
            $agenda = $session['agenda'];

            if (!$this->agenda->podeAgendar()) {
                return redirect()->route('agendamento.index')->withErrors('Ainda não há dispobilidade para agendamento');
            }

            if (($local->total_vagas - $local->total_vagas_preenchidas) === 0) {
                return redirect()->route('agendamento.localidade')->withErrors('Esse local não há dispobilidade para agendamento');
            }

            if ($pessoa->getIdade() < $agenda->faixa_etaria_min) {
                return redirect()->route('agendamento.dataPeriodo')->withErrors('Você não tem idade permitida para esse período');
            }

            if (!$agenda->tem_vaga) {
                return redirect()->route('agendamento.dataPeriodo')->withErrors('Esse período não há dispobilidade para agendamento');
            }


            return view('pages.agendamento.passo-4-confirmacao', compact('local', 'pessoa', 'agenda'));
        }

        public function validaPasso4()
        {
            if (!session()->has('agendamento')) {
                return redirect()->route('agendamento.index')->withErrors('A sessão expirou');
            }
            $session = session()->get('agendamento');

            /** @var Pessoa $pessoa */
            $pessoa = $session['pessoa'];
            /** @var Local $local */
            $local = $session['local'];
            /** @var Agenda $agenda */
            $agenda = $session['agenda'];

            if (!$this->agenda->podeAgendar()) {
                return redirect()->route('agendamento.index')->withErrors('Ainda não há dispobilidade para agendamento');
            }

            if (($local->total_vagas - $local->total_vagas_preenchidas) === 0) {
                return redirect()->route('agendamento.localidade')->withErrors('Esse local não há dispobilidade para agendamento');
            }

            if (!$agenda->tem_vaga) {
                return redirect()->route('agendamento.dataPeriodo')->withErrors('Esse período não há dispobilidade para agendamento');
            }

            $pessoa->save();

            if ($pessoa->temAgendamentoPraData($agenda->data)) {
                return redirect()->route('agendamento.dataPeriodo')->withErrors('Você já tem um agendamento para essa data');
            }

            $agendamento             = new Agendado();
            $agendamento->data       = $agenda->data;
            $agendamento->pessoa_id  = $pessoa->id;
            $agendamento->agenda_id  = $agenda->id;
            $agendamento->local_id   = $local->id;
            $agendamento->compareceu = false;
            $agendamento->save();

            $id = base64_encode($agendamento->id);
            session()->flush();
            return redirect()->route('agendamento.confirmacao.show', ['cpf' => $pessoa->cpf, 'id' => $id])->with('success', 'Agendamento realizado com sucesso');
        }


    }