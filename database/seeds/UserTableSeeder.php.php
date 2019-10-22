<?php

use Illuminate\Database\Seeder;
use dsTaskr\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'John Doe',
        	'email' => 'john@doe.com',
        	'password' => Hash::make('123')
        ]);
    }
}
