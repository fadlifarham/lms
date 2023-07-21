<?php

use Illuminate\Database\Seeder;
use Crockett\CsvSeeder\CsvSeeder;

class QuestionCSVTableSeeder extends CsvSeeder
{
    public function run()
    {
        $this->seedFromCSV(base_path('database/seeds/csvs/question.csv'), 'questions');
    }
}
