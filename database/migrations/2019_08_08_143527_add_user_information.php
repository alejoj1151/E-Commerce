<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('apellido');
            $table->string('direccion');
            $table->integer('telefono');
            $table->integer('identificacion')->unique();
            $table->integer('nit')->nullable($value = true);
            $table->string('empresa')->nullable($value = true);
            $table->integer('num_ventas')->nullable($value = true);
            $table->boolean('vendedor_aprobado')->nullable($value = true);
            $table->integer('puntuacion')->nullable($value = true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
