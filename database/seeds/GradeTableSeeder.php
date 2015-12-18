<?php

use Illuminate\Database\Seeder;

class GradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'grade' => 66.7,
            'taken' => TRUE,
            'quiz_id' => 1,
            'user_id' => 2,
        ]);
        DB::table('grades')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'grade' => 100,
            'taken' => TRUE,
            'quiz_id' => 2,
            'user_id' => 2,
        ]);
        DB::table('grades')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'grade' => 50,
            'taken' => TRUE,
            'quiz_id' => 1,
            'user_id' => 3,
        ]);
    }
}
