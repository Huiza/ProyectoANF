<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatioFinancierosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratio_financieros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_estado_financiero')->unsigned()->foreign()->references('id_estado_financiero')->on('estado_financieros')->onDelete('cascade');
            $table->integer('id_tipo_ratio')->unsigned()->foreign()->references('id')->on('tipo_ratios')->onDelete('cascade');
            $table->string('nombre_ratio');
            $table->double('calculo_ratio');
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
        Schema::dropIfExists('ratio_financieros');
    }
}
