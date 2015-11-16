<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Jill Harvard',
            'email' => 'jill@harvard.edu',
            'password' => bcrypt('helloworld'),
            'teacher' => TRUE,
        ]);
        DB::table('users')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'John Harvard',
            'email' => 'john@harvard.edu',
            'password' => bcrypt('helloworld'),
            'teacher' => FALSE,
        ]);
    }
}
