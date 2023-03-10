<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Propiedades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('propiedades', function (Blueprint $table) {
            $table->engine="InnoDB";
            
            $table->bigIncrements('id');
            $table->string('precio_uf');
            $table->string('contacto');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('descripcion');
            $table->bigInteger('categoria_id')->unsigned();
            $table->bigInteger('foto_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('foto_id')->references('id')->on('fotos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
