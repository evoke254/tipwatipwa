<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
//            'name' => Str::random(10),
          	'name' => 'kbhc',
            'email' => 'info@kbhc.info',
            'password' => bcrypt("dYJCm'y+43&r.L."),
            'email_verified_at' => now(),
    	    'remember_token' => Str::random(10),
        ],
    [

        'name' => 'lennox',
        'email' => 'lennox@lennox.lennox',
        'password' => bcrypt("lennox"),
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
    ]);
    }
}
