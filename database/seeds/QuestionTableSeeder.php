<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'id' => 1,
            'question' => 'How many letters in the English alphabet?',
            'quiz_id' => '1',
        ]);
        DB::table('questions')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'id' => 2,
            'question' => 'What is the first letter of the English alphabet?',
            'quiz_id' => '1',
        ]);
        DB::table('questions')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'id' => 3,
            'question' => 'Which letter is not a vowel?',
            'quiz_id' => '1',
        ]);
        DB::table('questions')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'id' => 4,
            'question' => 'Five is greater than four.',
            'quiz_id' => '2',
        ]);
        DB::table('questions')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'id' => 5,
            'question' => 'What is 40 in hexadecimal?',
            'quiz_id' => '2',
        ]);
        DB::table('questions')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'id' => 6,
            'question' => 'How many in a dozen?',
            'quiz_id' => '2',
        ]);
        DB::table('questions')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'id' => 7,
            'question' => 'Which one is not also a salad dressing?',
            'quiz_id' => '3',
        ]);
        DB::table('questions')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'id' => 8,
            'question' => 'What is the capital of the United States of America?',
            'quiz_id' => '3',
        ]);
        DB::table('questions')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'id' => 9,
            'question' => 'Dogs are better than cats.',
            'quiz_id' => '3',
        ]);
        DB::table('questions')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'id' => 10,
            'question' => 'Question with one correct answer.',
            'quiz_id' => '4',
        ]);
        DB::table('questions')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'id' => 11,
            'question' => 'Question with no correct answers.',
            'quiz_id' => '4',
        ]);
        DB::table('questions')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'id' => 12,
            'question' => 'Question with multiple correct answers.',
            'quiz_id' => '4',
        ]);
    }
}
