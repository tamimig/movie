<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); 
            $table->unsignedBigInteger('movie_id')->nullable(); 
            $table->string('sex'); 
            $table->date('date_of_birth'); 
            $table->string('bio'); 
            //$table->foreign('movie_id')->references('id')->on('movies');
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
        Schema::dropIfExists('producers');
    }
}
