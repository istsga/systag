<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvalidacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convalidaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')->constrained()->cascadeOnDelete();
            $table->foreignId('asignatura_id')->constrained()->cascadeOnDelete();
            $table->string('nota_final');
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
        Schema::dropIfExists('convalidaciones');
    }
}
