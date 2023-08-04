<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersTable extends Migration
{
    public function up()
    {
        Schema::create("Users", function (Blueprint $table){
            $table -> id();
            $table -> string("username")->unique();
            $table -> string("userTitle")->unique();
            $table -> string("password")->unique();
            $table -> timestamps();
        });
    }

    public function down()
    {
        //
    }
}
