<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoryTable extends Migration
{
    
    public function up()
    {
        Schema::create("categories", function (Blueprint $table){
            $table -> id();
            $table -> string("categoryTitle")->unique();
            $table -> string("categoryDescription");
            $table -> char("status");
            $table -> softDeletes();
            $table -> timestamps();
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