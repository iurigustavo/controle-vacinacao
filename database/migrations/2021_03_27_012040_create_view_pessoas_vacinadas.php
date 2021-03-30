<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewPessoasVacinadas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "create or replace view uvw_pessoas_vacinadas
AS
select
     CONCAT(substr(p.cpf, 1, 3), '.***.***-**')                                       AS `cpf`,
       `p`.`nome`                                            AS `nome`,
       `p`.`cns`                                            AS `cns`,
       `v1`.`data`                                           AS `v1_data`,
       `c1`.`descricao`                                      AS `v1_cargo`,
       `l1`.`descricao`                                      AS `v1_local`,
       `v2`.`data`                                           AS `v2_data`,
       `c2`.`descricao`                                      AS `v2_cargo`,
       `l2`.`descricao`                                      AS `v2_local`
from ((((((`pessoas` `p` left join `vacinacoes` `v1` on (((`v1`.`pessoa_id` = `p`.`id`) and (`v1`.`dose_id` = 1) and isnull(`v1`.`deleted_at`)))) left join `cargos` `c1` on ((`c1`.`id` = `v1`.`cargo_id`))) left join `locais` `l1` on ((`l1`.`id` = `v1`.`local_id`))) left join `vacinacoes` `v2` on (((`v2`.`pessoa_id` = `p`.`id`) and (`v2`.`dose_id` = 2) and isnull(`v2`.`deleted_at`)))) left join `cargos` `c2` on ((`c2`.`id` = `v2`.`cargo_id`)))
         left join `locais` `l2` on ((`l2`.`id` = `v2`.`local_id`)))
where isnull(`p`.`deleted_at`);
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
        DB::statement("DROP VIEW uvw_pessoas_vacinadas");
    }
}
