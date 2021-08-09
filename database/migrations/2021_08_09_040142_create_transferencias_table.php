<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('monto');
            $table->timestamps();
            $table->foreignId('id_origen');
            $table->integer('id_destino');
            $table->string('tipo_cuenta');
            $table->string('cuenta_origen');
            $table->string('cuenta_destino');
            $table->foreign('id_origen')->references('id')->on('cuentas')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transferencias');
    }
}
