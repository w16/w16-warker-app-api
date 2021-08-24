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
            $table->foreignId('cidade_id')->constrained()->cascadeOnDelete();
            $table->decimal('reservatorio', 5, 2); // armanzena um valor decimal com 5 casas, sendo 2 delas decimais
            $table->double('latitude');
            $table->double('longitude');
            $table->timestamps();
        });
    }

    //|id |cidade_id|reservatorio|latitude|longitude|created_at|updated_at|
    //|int|int(fk)  |int(1-100%) |double  |double   |timestamp |timestamp |

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
