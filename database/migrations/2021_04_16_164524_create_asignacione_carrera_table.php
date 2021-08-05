<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacioneCarreraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacione_carrera', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asignacione_id')
            ->constrained()
            ->cascadeOnDelete();
            $table->foreignId('carrera_id')
            ->constrained()
            ->cascadeOnDelete();
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
        Schema::dropIfExists('asignacione_carrera');
    }
}
