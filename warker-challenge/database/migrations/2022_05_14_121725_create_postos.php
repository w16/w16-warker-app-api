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
        Schema::create('postos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cidade_id');

            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->integer('reservatorio');
            $table->double('latitude', 8, 6);
            $table->double('longitude', 8, 6);
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
        Schema::dropForeign('cidade_id');
        Schema::dropIfExists('postos');
    }
};
