<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewPessoasVacinacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "create or replace view uvw_pessoas_vacinacao(id, nome, cpf, sexo, data_nascimento, idade, v1_data, v1_cargo, v1_local, v2_data, v2_cargo, v2_local) as
SELECT p.id,
       p.nome,
       p.cpf,
       p.sexo,
       p.data_nascimento,
       TIMESTAMPDIFF(YEAR,p.data_nascimento,CURDATE()) AS idade,
       v1.data                                                                   AS v1_data,
       c1.descricao                                                              AS v1_cargo,
       l1.descricao                                                              AS v1_local,
       v2.data                                                                   AS v2_data,
       c2.descricao                                                              AS v2_cargo,
       l2.descricao                                                              AS v2_local
FROM pessoas p
         LEFT JOIN vacinacoes v1 ON v1.pessoa_id = p.id AND v1.dose_id = 1 AND v1.deleted_at IS NULL
         LEFT JOIN cargos c1 ON c1.id = v1.cargo_id
         LEFT JOIN locais l1 ON l1.id = v1.local_id
         LEFT JOIN vacinacoes v2 ON v2.pessoa_id = p.id AND v2.dose_id = 2 AND v2.deleted_at IS NULL
         LEFT JOIN cargos c2 ON c2.id = v2.cargo_id
         LEFT JOIN locais l2 ON l2.id = v2.local_id
WHERE p.deleted_at IS NULL
";
        DB::statement($sql);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW uvw_pessoas_vacinacao");
    }
}
