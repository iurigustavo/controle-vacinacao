<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateLotes extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('lotes', function (Blueprint $table) {
                $table->id();
                $table->string('descricao');
                $table->integer('quantidade');
                $table->date('data_vencimento');
                $table->foreignId('vacina_id')->constrained('vacinas');
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
            Schema::dropIfExists('vacinas');
        }
    }
