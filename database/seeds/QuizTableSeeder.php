<?php

use Illuminate\Database\Seeder;

class QuizTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('quizzes')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'id' => 1,
            'ready' => TRUE,
            'quiz_name' => 'Alphabet Quiz',
        ]);

        DB::table('quizzes')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'id' => 2,
            'ready' => TRUE,
            'quiz_name' => 'Numbers Quiz',
        ]);

        DB::table('quizzes')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'id' => 3,
            'ready' => FALSE,
            'quiz_name' => 'Other Quiz',
        ]);

        DB::table('quizzes')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'id' => 4,
            'ready' => FALSE,
            'quiz_name' => 'Not Ready Quiz',
        ]);
    }
}
