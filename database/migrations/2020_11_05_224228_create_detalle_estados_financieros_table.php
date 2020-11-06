<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleEstadosFinancierosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_estados_financieros', function (Blueprint $table) {
            $table->bigIncrements('id_detalle_estados_financieros');
            $table->integer('id_estado_financiero')->unsigned()->foreign()->references('id_estado_financiero')->on('estado_financieros')->onDelete('cascade');
            $table->string('cuenta',250);
            $table->double('saldo');
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
        Schema::dropIfExists('detalle_estados_financieros');
    }
}
