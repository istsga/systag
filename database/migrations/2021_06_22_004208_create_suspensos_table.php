<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspensosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspensos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asignacione_id')->constrained()->cascadeOnDelete();
            $table->foreignId('asignatura_id')->constrained()->cascadeOnDelete();
            $table->foreignId('estudiante_id')->constrained()->cascadeOnDelete();
            $table->string('promedio_final');
            $table->string('examen_suspenso')->nullable();
            $table->string('suma')->nullable();
            $table->string('promedio_numero')->nullable();
            $table->string('promedio_letra');
            $table->string('observacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suspensos');
    }
}
