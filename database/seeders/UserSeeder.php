<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert(array(
            array(
                'name' => "Shuvra Biswas",
                'email' => 'shuvro@drawhouse.com',
                'phone' => '01558979268',
                'designation' => 'Developer',
                'user_type' => '1',
                'password' => Hash::make('123456')
            ),
            array(
                'name' => "Ariful Islam",
                'email' => 'arif@drawhouse.com',
                'phone' => '77885777',
                'designation' => 'Developer',
                'user_type' => '1',
                'password' => Hash::make('123456')
            )
        ));
    }
}

