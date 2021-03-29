<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateVacinacoes extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('vacinacoes', function (Blueprint $table) {
                $table->id();
                $table->date('data');
                $table->text('observacao')->nullable();
                $table->foreignId('pessoa_id')->constrained('pessoas');
                $table->foreignId('dose_id')->constrained('doses');
                $table->foreignId('cargo_id')->constrained('cargos');
                $table->foreignId('local_id')->constrained('locais');
                $table->foreignId('lote_id')->constrained('lotes');
                $table->timestamps();
                $table->softDeletes('deleted_at');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('vacinacoes');
        }
    }
