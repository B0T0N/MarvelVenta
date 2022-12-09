<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function(Blueprint $table){

            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('producto_id')->unsigned();
            $table->string('comentario');
            $table->timestamps();
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete("cascade");

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
};
