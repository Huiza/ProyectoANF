<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoFinancierosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_financieros', function (Blueprint $table) {
            $table->bigIncrements('id_estado_financiero');
            $table->integer('id_tipo_estado_financiero')->unsigned()->foreign()->references('id_tipo_estado_financiero')->on('tipo_estado_financieros')->onDelete('cascade');
            $table->integer('id_empresa')->unsigned()->foreign()->references('id')->on('empresas')->onDelete('cascade');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado_financieros');
    }
}
