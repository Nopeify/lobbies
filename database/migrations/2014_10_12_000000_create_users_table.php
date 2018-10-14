<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->default(1); // 1 = normal user // 2 = Premium // 3 = Admin // 99 = Banned
            $table->string('name')->default("no-name");
            $table->integer('lobbies')->default(0);
            $table->string('acc_url')->default("no-acc_url");
            $table->string('avatar')->default("no-avatar");
            $table->string('primaryclan')->default("0");
            $table->string('steamid')->unique();
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
        Schema::dropIfExists('users');
    }
}
