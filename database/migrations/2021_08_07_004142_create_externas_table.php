<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('externas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('cedula');
            $table->string('cuenta');
            $table->char('habilitada');
            $table->integer('monto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('externas');
    }
}
