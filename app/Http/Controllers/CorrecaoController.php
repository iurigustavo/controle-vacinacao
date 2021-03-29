<?php


    namespace App\Http\Controllers;


    use App\Http\Helpers\CallAPI;
    use App\Http\Helpers\DateUtils;
    use App\Models\Pessoa;
    use App\Models\Vacinacao;
    use App\Models\VacinacaoOld;

    class CorrecaoController extends Controller
    {
        public function executa()
        {
            set_time_limit(60 * 60);
            exit;


            /** @var VacinacaoOld[] $listaVacinacoes */
            $listaVacinacoes = VacinacaoOld::all();
            foreach ($listaVacinacoes as $vacinacaoOld) {

                $cpf    = $vacinacaoOld->nu_cpf;
                $cpf    = str_replace('.', '', str_replace('.', '', str_replace('-', '', $cpf)));
                $url    = "http://10.117.100.102:9090/v1/public_server/$cpf/active";
                $result = CallAPI::request('GET', $url);

                $pessoa = new Pessoa();
                if (!empty($result->value)) {
                    $pessoa->nome            = $result->value->nome;
                    $pessoa->data_nascimento = $result->value->nascimento;
                    $pessoa->sexo            = $result->value->sexo == 'M' ? 'Masculino' : 'Feminino';
                } else {
                    $pessoa->nome            = strtoupper($vacinacaoOld->tx_nome);
                    $pessoa->data_nascimento = DateUtils::StringParaData($vacinacaoOld->dt_nascimento);
                    $pessoa->sexo            = $vacinacaoOld->tp_sexo;
                }

                $pessoa->cpf = $vacinacaoOld->nu_cpf;
                $pessoa->cns = $vacinacaoOld->nu_cns;

                if (strlen($vacinacaoOld->tx_mes) > 3) {
                    $pessoa->positivado = 1;
                    $pessoa->mes        = $vacinacaoOld->tx_mes;
                    $pessoa->ano        = $vacinacaoOld->tx_ano;
                } else {
                    $pessoa->positivado = 0;
                }

                $pessoa->save();

                if (strlen($vacinacaoOld->dt_primeira) == 10) {
                    $vac             = new Vacinacao();
                    $vac->data       = DateUtils::StringParaData($vacinacaoOld->dt_primeira);
                    $vac->observacao = $vacinacaoOld->tx_observacao_1;
                    $vac->pessoa_id  = $pessoa->id;
                    $vac->dose_id    = 1;
                    $vac->cargo_id   = $vacinacaoOld->fk_tbgrhcargo_1;
                    $vac->local_id   = $vacinacaoOld->fk_tbgrhdepartamento_1;
                    $vac->save();
                }
            }
        }
    }
