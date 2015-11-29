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
            'id' => 1,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Jill Harvard',
            'email' => 'jill@harvard.edu',
            'password' => bcrypt('helloworld'),
            'teacher' => TRUE,
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'John Harvard',
            'email' => 'john@harvard.edu',
            'password' => bcrypt('helloworld'),
            'teacher' => FALSE,
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Jennifer Harvard',
            'email' => 'jennifer@harvard.edu',
            'password' => bcrypt('helloworld'),
            'teacher' => FALSE,
        ]);
        DB::table('users')->insert([
            'id' => 4,
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Jamal Harvard',
            'email' => 'jamal@harvard.edu',
            'password' => bcrypt('helloworld'),
            'teacher' => FALSE,
        ]);
    }
}
