<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class lobbies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('lobbies', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('lobby_type')->default(1); // 1 = normal // 2 = Premium
             $table->string('lobby_link');
             $table->integer('owner_id');
             $table->string('owner_url');
             $table->string('owner_name');
             $table->string('rank');
             $table->string('region');
             $table->string('type');
             $table->string('Prime');
             $table->rememberToken();
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
         Schema::dropIfExists('lobbies');
     }
}
