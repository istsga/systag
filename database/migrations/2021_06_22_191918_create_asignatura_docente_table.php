<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturaDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignatura_docente', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asignacione_id')->constrained()->cascadeOnDelete();
            $table->foreignId('asignatura_id')->constrained()->cascadeOnDelete();
            $table->foreignId('docente_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('asignatura_docente');
    }
}
