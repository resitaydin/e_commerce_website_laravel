<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')-> insert(
            [
                [
                    'categoryTitle'=> 'Electronics',
                    'categoryDescription'=>  'Electronics Stuffs',
                    'status'=> '1',
                ],
                [
                    'categoryTitle'=> 'Books',
                    'categoryDescription'=>  'Books & Books',
                    'status'=> '0',
                ],
                [
                    'categoryTitle'=> 'Clothing',
                    'categoryDescription'=>  'Clothes',
                    'status'=> '1',
                ]
            ]
        );
    }
}
