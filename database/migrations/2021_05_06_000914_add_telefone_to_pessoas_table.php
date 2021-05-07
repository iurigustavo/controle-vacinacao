<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class AddTelefoneToPessoasTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::table('pessoas', function (Blueprint $table) {
                $table->string('telefone', '20')->nullable()->after('data_nascimento');
                $table->bigInteger('raca_id')->nullable()->unsigned()->change();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::table('pessoas', function (Blueprint $table) {
                $table->dropColumn('telefones');
            });
        }
    }
