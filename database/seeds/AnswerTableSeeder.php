<?php

use Illuminate\Database\Seeder;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => '23',
            'correct' => FALSE,
            'question_id' => '1',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => '26',
            'correct' => TRUE,
            'question_id' => '1',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => '28',
            'correct' => FALSE,
            'question_id' => '1',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => '16',
            'correct' => FALSE,
            'question_id' => '1',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => 'A',
            'correct' => TRUE,
            'question_id' => '2',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => 'E',
            'correct' => FALSE,
            'question_id' => '2',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => 'Z',
            'correct' => FALSE,
            'question_id' => '2',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => 'A',
            'correct' => FALSE,
            'question_id' => '3',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => 'E',
            'correct' => FALSE,
            'question_id' => '3',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => 'I',
            'correct' => FALSE,
            'question_id' => '3',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => 'R',
            'correct' => TRUE,
            'question_id' => '3',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => 'U',
            'correct' => FALSE,
            'question_id' => '3',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => 'False',
            'correct' => FALSE,
            'question_id' => '4',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => 'True',
            'correct' => TRUE,
            'question_id' => '4',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => '30',
            'correct' => FALSE,
            'question_id' => '5',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => '28',
            'correct' => TRUE,
            'question_id' => '5',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => '2A',
            'correct' => FALSE,
            'question_id' => '5',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => '13',
            'correct' => FALSE,
            'question_id' => '6',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => '9',
            'correct' => FALSE,
            'question_id' => '6',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => '12',
            'correct' => TRUE,
            'question_id' => '6',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => '10',
            'correct' => FALSE,
            'question_id' => '6',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => 'English',
            'correct' => TRUE,
            'question_id' => '7',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => 'French',
            'correct' => FALSE,
            'question_id' => '7',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => 'Russian',
            'correct' => FALSE,
            'question_id' => '7',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => 'Italian',
            'correct' => FALSE,
            'question_id' => '7',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => 'Boston, Massachusetts',
            'correct' => FALSE,
            'question_id' => '8',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => 'Seattle, Washington',
            'correct' => FALSE,
            'question_id' => '8',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => 'Washington, D.C.',
            'correct' => TRUE,
            'question_id' => '8',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => 'False',
            'correct' => True,
            'question_id' => '9',
        ]);
        DB::table('answers')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'answer' => 'True',
            'correct' => False,
            'question_id' => '9',
        ]);
    }
}
