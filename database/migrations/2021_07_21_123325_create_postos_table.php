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
            // Cria cidade_id e cidade_type
            $table->morphs('cidade');
            $table->integer('reservatorio');
            $table->double('latitude');
            $table->double('longitude');
            $table->timestamps();
            $table->foreign('cidade_id')
                ->references('id')
                ->on('cidades')
                ->onDelete('cascade');
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
