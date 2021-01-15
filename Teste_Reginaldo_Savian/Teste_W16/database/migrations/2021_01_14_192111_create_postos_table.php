<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_cidade');
            $table->integer('reservatorio');
            $table->double('latitude');
            $table->double('longitude');
            $table->timestamps();

            $table->foreign('id_cidade')->references('id')->on('cidades')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postos');
    }
}
