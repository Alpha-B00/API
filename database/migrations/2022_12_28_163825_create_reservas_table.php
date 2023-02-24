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
        Schema::create('reservas', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger("id_cliente")->nullable();
            $table->unsignedBigInteger('id_invitado')->nullable();
            $table->unsignedBigInteger('id_menu')->nullable();
            $table->unsignedBigInteger('id_mesa')->nullable();
            $table->string('num_tarjeta')->nullable();
            $table->unsignedbigInteger('fecha_reserva');
            $table->integer('num_persona')->nullable();
            $table->timestamps();

            $table->foreign('fecha_reserva')->references('id')->on('horarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
};
