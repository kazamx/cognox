<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCueExtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cue_exts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cuenta');
            $table->foreignId('id_externa');
            $table->timestamps();
            $table->foreign('id_cuenta')->references('id')->on('cuentas')
                ->onDelete('cascade');
                $table->foreign('id_externa')->references('id')->on('externas')
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
        Schema::dropIfExists('cue_exts');
    }
}
