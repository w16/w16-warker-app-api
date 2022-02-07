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
            $table->id();
            //$table->unsignedInteger('cidade_id');
           // $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->foreignId('cidade_id')->constrained()->cascadeOnDelete();

            $table->integer('reservatorio');
            $table->double('latitude');
            $table->double('longitude');

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
        Schema::dropIfExists('postos');
    }
}
