<?php

use App\User;
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
        if(!empty(env('DEFAULT_ADMIN_NAME', '')))
        {
        	User::firstOrCreate([
        		'name'      => env('DEFAULT_ADMIN_NAME', ''),
        		'email'     => env('DEFAULT_ADMIN_EMAIL', ''),
		        'password'  => env('DEFAULT_ADMIN_PASSWORD', ''),
	        ]);
        }
    }
}
