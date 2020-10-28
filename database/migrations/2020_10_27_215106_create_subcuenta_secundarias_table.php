<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcuentaSecundariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcuenta_secundarias', function (Blueprint $table) {
            $table->bigIncrements('id_subcuenta_secundaria');
            $table->integer('id_subcuenta_primaria')->unsigned()->foreign()->references('id_subcuenta_primaria')->on('subcuenta_primarias')->onDelete('cascade');
            $table->string('codigo_subcuenta_secundaria');
            $table->string('nombre_subcuenta_secundaria',150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcuenta_secundarias');
    }
}
