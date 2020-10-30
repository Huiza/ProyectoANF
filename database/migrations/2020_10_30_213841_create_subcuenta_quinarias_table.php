<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcuentaQuinariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcuenta_quinarias', function (Blueprint $table) {
            $table->bigIncrements('id_subcuenta_quinaria');
            $table->integer('id_subcuenta_cuaternaria')->unsigned()->foreign()->references('id_subcuenta_cuaternaria')->on('subcuenta_cuaternarias')->onDelete('cascade');
            $table->string('nombre_subcuenta_terciaria',150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcuenta_quinarias');
    }
}
