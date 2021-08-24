<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asignacione_id')->constrained()->cascadeOnDelete();
            //$table->foreignId('asignatura_id')->constrained()->cascadeOnDelete();
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->date('fecha_examen');
            $table->date('fecha_suspension');
            $table->enum('orden', ["1", "2", "3"]);
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
        Schema::dropIfExists('horarios');
    }
}
