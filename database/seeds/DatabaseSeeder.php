<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

     DB::table('domain')->insert([
            'emaildomain' => str_random(6).'.com',
        ]);
		
		  DB::table('userdomain')->insert([
            'useremail' => str_random(10).'@'.'gmail.com',
        ]);

        Model::reguard();
    }
}
