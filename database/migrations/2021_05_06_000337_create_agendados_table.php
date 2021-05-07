<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateAgendadosTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('agendados', function (Blueprint $table) {
                $table->id();
                $table->date('data');
                $table->boolean('compareceu');
                $table->foreignId('pessoa_id')->constrained('pessoas');
                $table->foreignId('agenda_id')->constrained('agendas');
                $table->foreignId('local_id')->constrained('locais');
                $table->timestamps();
                $table->softDeletes();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('agendados');
        }
    }
