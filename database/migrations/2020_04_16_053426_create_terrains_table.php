<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terrains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('typeterrain_id');
            $table->unsignedbigInteger('club_id');
            $table->string('nom');
            $table->integer('price');
            $table->string('image');
            $table->foreign('typeterrain_id')
                ->references('id')
                ->on('typeterrains')
                ->onDelete('cascade');
            $table->foreign('club_id')
                ->references('id')
                ->on('clubs')
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
        Schema::dropIfExists('terrains');
    }
}
