<?php


    namespace App\Services;


    use App\Models\Vacinacao;
    use Illuminate\Support\Collection;
    use Illuminate\Support\Facades\DB;

    class GraficoService
    {
        /**
         * @return Collection
         */
        public function getTotalPorDia()
        {
            return Vacinacao::selectRaw("DATE_FORMAT(data,'%d/%m/%Y') AS data,data data_original,count(*) total")->groupBy('data')->orderBy('data_original', 'asc')->get();
        }

        /**
         * @return Collection
         */
        public function getTotalPorDose()
        {
            return Vacinacao::selectRaw('doses.id, doses.descricao, count(*) as total')->leftJoin('doses', 'doses.id', '=', 'vacinacoes.dose_id')
                            ->groupBy(['doses.id', 'doses.descricao'])->orderBy('doses.id', 'asc')->get();
        }

        /**
         * @return int
         */
        public function getTotalVacinados()
        {
            return Vacinacao::count();
        }

        public function getTotalPorFaixaEtaria()
        {
            $query = "SELECT CASE
           WHEN uvw_pessoas_vacinacao.idade >= 0 AND uvw_pessoas_vacinacao.idade <= 10 THEN '0 - 10'
           WHEN uvw_pessoas_vacinacao.idade >= 11 AND uvw_pessoas_vacinacao.idade <= 20 THEN '11 - 20'
           WHEN uvw_pessoas_vacinacao.idade >= 21 AND uvw_pessoas_vacinacao.idade <= 30 THEN '21 - 30'
           WHEN uvw_pessoas_vacinacao.idade >= 31 AND uvw_pessoas_vacinacao.idade <= 40 THEN '31 - 40'
           WHEN uvw_pessoas_vacinacao.idade >= 41 AND uvw_pessoas_vacinacao.idade <= 50 THEN '41 - 50'
           WHEN uvw_pessoas_vacinacao.idade >= 51 AND uvw_pessoas_vacinacao.idade <= 60 THEN '51 - 60'
           WHEN uvw_pessoas_vacinacao.idade >= 61 AND uvw_pessoas_vacinacao.idade <= 70 THEN '61 - 70'
           WHEN uvw_pessoas_vacinacao.idade >= 71 AND uvw_pessoas_vacinacao.idade <= 80 THEN '71 - 80'
           WHEN uvw_pessoas_vacinacao.idade > 80 THEN '80 +'
           ELSE NULL
           END  AS faixa_etaria,
       count(1) AS total
FROM uvw_pessoas_vacinacao
WHERE uvw_pessoas_vacinacao.v1_data IS NOT NULL
   OR uvw_pessoas_vacinacao.v2_data IS NOT NULL
GROUP BY (
             CASE
                 WHEN uvw_pessoas_vacinacao.idade >= 0 AND uvw_pessoas_vacinacao.idade <= 10 THEN '0 - 10'
                 WHEN uvw_pessoas_vacinacao.idade >= 11 AND uvw_pessoas_vacinacao.idade <= 20 THEN '11 - 20'
                 WHEN uvw_pessoas_vacinacao.idade >= 21 AND uvw_pessoas_vacinacao.idade <= 30 THEN '21 - 30'
                 WHEN uvw_pessoas_vacinacao.idade >= 31 AND uvw_pessoas_vacinacao.idade <= 40 THEN '31 - 40'
                 WHEN uvw_pessoas_vacinacao.idade >= 41 AND uvw_pessoas_vacinacao.idade <= 50 THEN '41 - 50'
                 WHEN uvw_pessoas_vacinacao.idade >= 51 AND uvw_pessoas_vacinacao.idade <= 60 THEN '51 - 60'
                 WHEN uvw_pessoas_vacinacao.idade >= 61 AND uvw_pessoas_vacinacao.idade <= 70 THEN '61 - 70'
                 WHEN uvw_pessoas_vacinacao.idade >= 71 AND uvw_pessoas_vacinacao.idade <= 80 THEN '71 - 80'
                 WHEN uvw_pessoas_vacinacao.idade > 80 THEN '80 +'
                 ELSE NULL
                 END)
ORDER BY (
             CASE
                 WHEN uvw_pessoas_vacinacao.idade >= 0 AND uvw_pessoas_vacinacao.idade <= 10 THEN '0 - 10'
                 WHEN uvw_pessoas_vacinacao.idade >= 11 AND uvw_pessoas_vacinacao.idade <= 20 THEN '11 - 20'
                 WHEN uvw_pessoas_vacinacao.idade >= 21 AND uvw_pessoas_vacinacao.idade <= 30 THEN '21 - 30'
                 WHEN uvw_pessoas_vacinacao.idade >= 31 AND uvw_pessoas_vacinacao.idade <= 40 THEN '31 - 40'
                 WHEN uvw_pessoas_vacinacao.idade >= 41 AND uvw_pessoas_vacinacao.idade <= 50 THEN '41 - 50'
                 WHEN uvw_pessoas_vacinacao.idade >= 51 AND uvw_pessoas_vacinacao.idade <= 60 THEN '51 - 60'
                 WHEN uvw_pessoas_vacinacao.idade >= 61 AND uvw_pessoas_vacinacao.idade <= 70 THEN '61 - 70'
                 WHEN uvw_pessoas_vacinacao.idade >= 71 AND uvw_pessoas_vacinacao.idade <= 80 THEN '71 - 80'
                 WHEN uvw_pessoas_vacinacao.idade > 80 THEN '80 +'
                 ELSE NULL
                 END);
";

            $result =  DB::select($query);
            $result = array_map(function ($value) {
                return (array)$value;
            }, $result);

            return $result;

        }

        /**
         * @return Collection
         */
        public function getTotalPorLocais()
        {

            return Vacinacao::selectRaw('descricao, count(*) as total')
                            ->leftJoin('locais', 'locais.id', '=', 'vacinacoes.local_id')
                            ->groupBy('descricao')
                            ->get();
        }

        /**
         * @return Collection
         */
        public function getTotalPorSexo()
        {
            return Vacinacao::selectRaw('sexo, count(*) as total')
                            ->leftJoin('pessoas', 'pessoas.id', '=', 'vacinacoes.pessoa_id')
                            ->groupBy('pessoas.sexo')
                            ->get();
        }
    }