<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')-> insert(
            [
                [
                    'productTitle'      => 'Toy',  // must be unique for 'users' database to avoid duplication.
                    'productCategoryId'     => '1',
                    'barcode' => '123213124',
                    'productStatus'      => '1',
                ],
                [
                    'productTitle'      => 'Apple',  // must be unique for 'users' database to avoid duplication.
                    'productCategoryId'     => '2',
                    'barcode' => '141512524',
                    'productStatus'      => '0',
                ],
                [
                    'productTitle'      => 'Computer',  // must be unique for 'users' database to avoid duplication.
                    'productCategoryId'     => '1',
                    'barcode' => '12QE1231WE98',
                    'productStatus'      => '1',
                ]
            ]
        );
    }
}
