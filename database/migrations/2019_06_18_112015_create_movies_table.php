<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');  
            $table->string('name');
            $table->unsignedBigInteger('producer_id')->nullable();
            $table->date('year_of_release'); 
            $table->text('plot'); 
            $table->string('image')->nullable(); 

          //  $table->foreign('producer_id')->references('id')->on('producers');

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
        Schema::dropIfExists('movies');
    }
}
