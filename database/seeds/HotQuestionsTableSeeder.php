<?php

use Illuminate\Database\Seeder;

class HotQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hot_questions')->insert([
            [
                'module_id'     => 1,
                'problem'       => 'Sebutkan nama-nama ikan ? ',
                'picture'       => 'https://t3.ftcdn.net/jpg/00/92/53/56/240_F_92535664_IvFsQeHjBzfE6sD4VHdO8u5OHUSc6yHF.jpg',
                'option_a'      => 'Pilihan 1',
                'option_b'      => 'Pilihan 2',
                'option_c'      => 'Pilihan 3',
                'option_d'      => 'Pilihan 4',
                'option_e'      => 'Pilihan 5',
                'answer'        => 'CUCUU',
            ],
            [
                'module_id'     => 1,
                'problem'       => 'Sebutkan nama-nama ikan 2 ? ',
                'picture'       => 'https://t3.ftcdn.net/jpg/00/92/53/56/240_F_92535664_IvFsQeHjBzfE6sD4VHdO8u5OHUSc6yHF.jpg',
                'option_a'      => 'Pilihan 1',
                'option_b'      => 'Pilihan 2',
                'option_c'      => 'Pilihan 3',
                'option_d'      => 'Pilihan 4',
                'option_e'      => 'Pilihan 5',
                'answer'        => 'CUCUU',
            ],
            [
                'module_id'     => 1,
                'problem'       => 'Sebutkan nama-nama ikan 3 ? ',
                'picture'       => 'https://t3.ftcdn.net/jpg/00/92/53/56/240_F_92535664_IvFsQeHjBzfE6sD4VHdO8u5OHUSc6yHF.jpg',
                'option_a'      => 'Pilihan 1',
                'option_b'      => 'Pilihan 2',
                'option_c'      => 'Pilihan 3',
                'option_d'      => 'Pilihan 4',
                'option_e'      => 'Pilihan 5',
                'answer'        => 'CUCUU',
            ]
        ]);
    }
}
