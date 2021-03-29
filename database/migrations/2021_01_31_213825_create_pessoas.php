<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePessoas extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('pessoas', function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->string('cpf', 15);
                $table->string('sexo', 20);
                $table->string('cns')->nullable();
                $table->date('data_nascimento');
                $table->string('end_rua', 200)->nullable();
                $table->string('end_numero', 20)->nullable();
                $table->string('end_bairro', 200)->nullable();
                $table->string('end_cep', 9)->nullable();
                $table->string('end_cidade', 100)->nullable();
                $table->string('end_uf', 2)->nullable();
                $table->foreignId('raca_id')->constrained('racas');
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
            Schema::dropIfExists('pessoas');
        }
    }
