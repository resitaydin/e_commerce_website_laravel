<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
            DB::table('users')-> insert(
                [
                    [
                        'username'=> 'turkuvaz',
                        'userTitle'=>  'Turkuvaz',
                        'password'=> Hash::make('123456'),
                    ],
                    [
                        'username'=> 'admin',
                        'userTitle'=>  'ADMIN',
                        'password'=> Hash::make('admin123'),
                    ],
                    [
                        'username'=> 'idefix',
                        'userTitle'=>  'Idefix',
                        'password'=> Hash::make('idefix123'),
                    ]
                ]
            );
    }
}
