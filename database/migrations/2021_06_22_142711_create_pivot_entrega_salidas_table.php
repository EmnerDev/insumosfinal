<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotEntregaSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_entrega_salidas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entrega_id');
            $table->foreign('entrega_id')->references('id')->on('entregas')->onDelete('cascade') ;

            $table->unsignedBigInteger('salida_id');
            $table->foreign('salida_id')->references('id')->on('salida_productos')->onDelete('cascade');
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
        Schema::dropIfExists('pivot_entrega_salidas');
    }
}
