<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersTable extends Migration
{
    public function up()
    {
        Schema::create("users", function (Blueprint $table){
            $table -> id();
            $table -> string("username")->unique();
            $table -> string("userTitle");
            $table -> string("password");
            $table -> softDeletes();
            $table -> timestamps();
        });
    }

    public function down()
    {
        //
    }
}
