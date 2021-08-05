<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodacademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodacademicos', function (Blueprint $table) {
            $table->id();
            $table->enum('estado', ['Nuevo', 'En Curso', 'Finalizado']);
            $table->string('periodo')->unique();
            $table->date('fecha_inicio');
            $table->date('fecha_final');
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
        Schema::dropIfExists('periodacademicos');
    }
}
