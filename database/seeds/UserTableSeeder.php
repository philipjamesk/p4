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
            'name' => 'Philip Kelnhofer',
            'email' => 'pjkelnhofer@gmail.com',
            'password' => '123456',
            'teacher' => TRUE,
        ]);
        DB::table('users')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Jill Harvard',
            'email' => 'jill@harvard.edu',
            'password' => 'helloworld',
            'teacher' => FALSE,
        ]);
        DB::table('users')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'John Harvard',
            'email' => 'john@harvard.edu',
            'password' => 'helloworld',
            'teacher' => FALSE,
        ]);
    }
}
