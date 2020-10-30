<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcuentaPrimariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcuenta_primarias', function (Blueprint $table) {
            $table->bigIncrements('id_subcuenta_primaria');
            $table->integer('id_cuenta_mayor')->unsigned()->foreign()->references('id_cuenta_mayor')->on('cuenta_mayors')->onDelete('cascade');
            $table->string('nombre_subcuenta_primaria',150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcuenta_primarias');
    }
}
