<?php


    namespace App\Http\Controllers\Agendamento;


    use App\Http\Controllers\Controller;
    use App\Http\Helpers\DateUtils;
    use App\Models\Agendado;
    use App\Models\Pessoa;
    use Illuminate\Http\Request;

    class ConsultaController extends Controller
    {
        public function show($cpf, $id)
        {
            $pessoa      = Pessoa::whereCpf($cpf)->firstOrFail();
            $agendamento = Agendado::wherePessoaId($pessoa->id)->whereId(base64_decode($id))->firstOrFail();

            return view('pages.agendamento.show', compact('agendamento'));
        }

        public function consulta(Request $request)
        {
            $pessoa = new Pessoa();
            if ($request->has('cpf')) {
                $pessoa = Pessoa::whereCpf($request->cpf)->where('data_nascimento', DateUtils::StringParaData($request->data_nascimento))->firstOrNew();
            }
            return view('pages.agendamento.consulta', compact('pessoa'));
        }
    }