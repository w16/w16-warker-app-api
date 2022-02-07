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
            $table->unsignedBigInteger('cidade_id');
            $table->integer('reservatorio');
            $table->double('latitude');
            $table->double('logitude');
            $table->timestamps();

            //foreign key (constrait)
            $table->foreign('cidade_id')->references('id')->on('cidades');

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
