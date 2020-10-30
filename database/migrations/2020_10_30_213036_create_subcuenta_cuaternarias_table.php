<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcuentaCuaternariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcuenta_cuaternarias', function (Blueprint $table) {
            $table->bigIncrements('id_subcuenta_cuaternaria');
            $table->integer('id_subcuenta_terciaria')->unsigned()->foreign()->references('id_subcuenta_terciaria')->on('subcuenta_terciarias')->onDelete('cascade');
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
        Schema::dropIfExists('subcuenta_cuaternarias');
    }
}
