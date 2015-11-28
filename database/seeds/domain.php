<?php

use Illuminate\Database\Seeder;

class domain extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  DB::table('domain')->insert([
            'emaildomain' => '@'.str_random(10).'.com',
        ]);
            
    }
}
