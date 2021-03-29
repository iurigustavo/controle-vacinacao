<?php

    namespace App\Http\Controllers;

    use App\Http\Helpers\DateUtils;
    use App\Services\VacinacaoService;
    use Cocur\Slugify\Slugify;
    use Illuminate\Http\Request;
    use Jimmyjs\ReportGenerator\ReportMedia\ExcelReport;

    class RelatoriosController extends Controller
    {

        protected VacinacaoService $vacinacaoService;

        public function __construct(VacinacaoService $vacinacaoService)
        {
            $this->vacinacaoService = $vacinacaoService;
        }

        public function geral(Request $request)
        {

            // GERADOR DE RELATÓRIO SIMPLES

            $queryBuilder = $this->vacinacaoService->listVacinacaoPelaData(DateUtils::StringParaData($request->input('data_inicio')), DateUtils::StringParaData($request->input('data_fim')));
            $title        = 'Relatório Geral de Vacinação';

            $meta = [
                'Parâmetros do relatório de: ' => $request->input('data_inicio').' até: '.$request->input('data_fim'),
            ];

            $columns  = [
                'CPF'                => 'cpf',
                'Nome'               => 'nome',
                'CNS'                => 'cns',
                'Data de Nascimento' => 'datanasc',
                '1ª Dose'            => 'prim_dose',
                'Local da 1ª Dose'   => 'local_prim_dose',
                '2ª Dose'            => 'seg_dose',
                'Local da 2ª Dose'   => 'local_seg_dose',
            ];

            $slugify  = new Slugify();
            $filename = $slugify->slugify('Relatório Geral de Vacinação-'.DateUtils::Now());

            $report = new ExcelReport();
            return $report->of($title, $meta, $queryBuilder, $columns)
                          ->showNumColumn(FALSE)
                          ->download($filename);

        }


    }
