<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')-> insert(
            [
                [
                    'categoryTitle'=> 'Electronics',
                    'categoryDescription'=>  'Electronics Stuffs',
                    'status'=> 'active',
                ],
                [
                    'categoryTitle'=> 'Books',
                    'categoryDescription'=>  'Books & Books',
                    'status'=> 'active',
                ],
                [
                    'categoryTitle'=> 'Clothing',
                    'categoryDescription'=>  'Clothes',
                    'status'=> 'active',
                ]
            ]
        );
    }
}
