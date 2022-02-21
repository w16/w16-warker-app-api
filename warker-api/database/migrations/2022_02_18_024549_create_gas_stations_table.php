<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGasStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gas_stations', function (Blueprint $table) {
            $table->id(); //Let's keep bigInterger in real life we don't know how large the project can grow.
            $table->unsignedBigInteger('cidade_id');
            //I've used tinyInt here beacuse the just enough to 
            //Store Percentage values it goes from -128 to 127
            $table->tinyInteger('reservatorio');
            $table->double('latitude');
            $table->double('longitude');
            $table->timestamps();
            $table->foreign('cidade_id')
                ->references('id')
                ->on('cities')
                //I know we should use cascade wisely but I"ll stick to this in the project
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
        Schema::dropIfExists('gas_stations');
    }
}
