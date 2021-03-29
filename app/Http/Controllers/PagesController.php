<?php

    namespace App\Http\Controllers;

    use App\Http\Helpers\CallAPI;
    use App\Models\Vacinacao;
    use App\Models\viewPessoasVacinacao;
    use App\Services\Cargos\CargoService;
    use App\Services\Cargos\NomeacaoService;
    use App\Services\GraficoService;
    use Exception;
    use Illuminate\Support\Arr;
    use Illuminate\Support\Facades\DB;

    class PagesController extends Controller
    {


        public function index()
        {
            $page_title = 'Dashboard';

            return view('pages.principal', compact('page_title'));
        }

        public function vacinometro()
        {

            $graficosService = new GraficoService();

            $resultPorDose            = $graficosService->getTotalPorDose()->toArray();
            $resultPorDia             = $graficosService->getTotalPorDia()->toArray();
            $resultPorSexo            = $graficosService->getTotalPorSexo()->toArray();
            $resultPorEstabelecimento = $graficosService->getTotalPorLocais()->toArray();
            $resultPorFaixaEtaria     = $graficosService->getTotalPorFaixaEtaria();
            $resultTotalVacinados     = $graficosService->getTotalVacinados();


            return view('pages.vacinometro.vacinometro',
                compact('resultPorSexo', 'resultPorEstabelecimento', 'resultPorFaixaEtaria', 'resultPorDia', 'resultTotalVacinados', 'resultPorDose'
                ));
        }

        public function pessoasVacinadas()
        {
            $result = [
                'draw'   => 1,
                'status' => 200
            ];

            try {
                $view = DB::connection('mysql')->table('uvw_pessoas_vacinadas')->get();

                $result['recordsTotal']    = $view->count();
                $result['recordsFiltered'] = $view->count();
                $rows                      = [];
                $results                   = $view->toArray();
                foreach ($results as $row) {
                    $rows[] = array_values((array) $row);
                }
                $result['data'] = $rows;
            } catch (Exception $e) {
                $result = [

                    'status' => 500,
                    'error'  => $e->getMessage()
                ];
            }
            return response()->json($result, $result['status']);

        }

    }
