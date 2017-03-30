<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
use App\Movie;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('rents', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('movie_id')->unsigned();
          $table->integer('user_id')->unsigned();
          $table->foreign('movie_id')->references('id')->on('movies');
          $table->foreign('user_id')->references('id')->on('users');
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
        //
    }
}
