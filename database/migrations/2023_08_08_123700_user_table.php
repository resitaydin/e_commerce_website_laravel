<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserTable extends Migration
{
    public function up()
    {
        Schema::create("users", function (Blueprint $table){
            $table -> id();
            $table -> string("username");
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
