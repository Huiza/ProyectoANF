<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_empresa')->unsigned()->foreign()->references('id')->on('empresas')->onDelete('cascade');
            $table->integer('id_cuenta')->unsigned()->foreign()->references('id_cuenta')->on('cuentas')->onDelete('cascade');
            $table->string('codigo_cuenta',25)->nullable();
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
        Schema::dropIfExists('catalogo');
    }
}
