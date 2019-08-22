<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carritos', function (Blueprint $table) {
            $table->bigIncrements('idCarrito');
            $table->timestamps();
            $table->Integer('IdProducto');
            $table->string('emailUser');
            $table->Integer('cantidad');
            $table->Integer('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carritos');
    }
}
