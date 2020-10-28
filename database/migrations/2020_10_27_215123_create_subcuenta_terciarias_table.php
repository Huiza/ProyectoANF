<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcuentaTerciariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcuenta_terciarias', function (Blueprint $table) {
            $table->bigIncrements('id_subcuenta_terciaria');
            $table->integer('id_subcuenta_secundaria')->unsigned()->foreign()->references('id_subcuenta_secundaria')->on('subcuenta_secundarias')->onDelete('cascade');
            $table->string('codigo_subcuenta_terciaria');
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
        Schema::dropIfExists('subcuenta_terciarias');
    }
}
