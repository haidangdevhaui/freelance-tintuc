<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
        	'name' => 'Quản trị',
        	'email' => 'admin@gmail.com',
        	'password' => \Hash::make('12345678')
        ]);
    }
}
