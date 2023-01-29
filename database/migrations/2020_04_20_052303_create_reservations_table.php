<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('terrain_id');
            $table->unsignedbigInteger('delegate_id');
            $table->date('date_start');
            $table->date('date_end');
            $table->integer('price');
            $table->foreign('terrain_id')
                ->references('id')
                ->on('terrains')
                ->onDelete('cascade');
            $table->foreign('delegate_id')
                ->references('id')
                ->on('delegates')
                ->onDelete('cascade');
            $table->timestamps();
            $table->rememberToken();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
