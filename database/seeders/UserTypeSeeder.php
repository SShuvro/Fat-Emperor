<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('usertype')->insert(array(
            array(
                'name' => "Super Admin"
                
            ),
            array(
                'name' => "Admin"
                
            ),
            array(
                'name' => "Moderator"
                
            ),
            array(
                'name' => "Editor"
                
            )
            
        ));
    }

}

