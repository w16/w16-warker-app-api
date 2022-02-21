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
            $table->foreignId('cidade_id')
                  ->constrained('cidades')
                  ->cascadeOnDelete();
            $table->string('nome_do_posto', 255);
            $table->integer('reservatorio');
            $table->double('latitude', 10, 8);
            $table->double('longitude', 11, 8);
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
