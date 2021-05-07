<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateAgendasTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('agendas', function (Blueprint $table) {
                $table->id();
                $table->date('data');
                $table->string('periodo', 200);
                $table->unsignedInteger('quantidade')->default(0);
                $table->unsignedInteger('faixa_etaria_min')->default(NULL)->nullable();
                $table->unsignedInteger('faixa_etaria_max')->default(NULL)->nullable();
                $table->boolean('habilitado')->default(0);
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
            Schema::dropIfExists('agendas');
        }
    }
