<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Activity extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('activities', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('action_type'); // 1 = Lobby Click | 2 = Lobby Make | 3 = Login | 4 = users banned
      $table->string('ip')->nullable();
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
    Schema::dropIfExists('activities');
  }
}
