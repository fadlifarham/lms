<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $section = [
            ['overview'     => 'Shortcut. Memahami cara penggunaan tools merupakan kewajiban agar bisa memahami materi-materi keuangan. Shortcut dari Excel begitu banyaknya, tetapi hanya sebagian kecil saja yang mungkin akan sering dipakai saat bekerja. ',
            'title'         => 'Section 1 Excel',
            'module_id'     => '1',
            'ticket_type_id'    => 1,
            'instruction'   => '1. Kerjakan pre-test terlebih dahulu sebagai tes dasar pengetahuan Anda terkait shortcut di Excel.
                                2. Tonton video pembelajaran.
                                3. Baca knowledge wajib yang juga perlu diketahui.
                                4. Kerjakan pos-test sebagai tes akhir.', 
            'knowledge'     => 'Buatlah latihan Excel dan isikan dengan Sum.', 
            'examines'      => 'Link soal UTS UAS'],
            ['overview'     => 'Shortcut. Memahami cara penggunaan tools merupakan kewajiban agar bisa memahami materi-materi keuangan. Shortcut dari Excel begitu banyaknya, tetapi hanya sebagian kecil saja yang mungkin akan sering dipakai saat bekerja. ',
            'title'         => 'Section 1 Excel',
            'module_id'     => '1',
            'ticket_type_id'    => 2,
            'instruction'   => '1. Kerjakan pre-test terlebih dahulu sebagai tes dasar pengetahuan Anda terkait shortcut di Excel. 2. Tonton video pembelajaran. 3. Baca knowledge wajib yang juga perlu diketahui. 4. Kerjakan pos-test sebagai tes akhir.', 
            'knowledge'     => 'Buatlah latihan Excel dan isikan dengan Sum.', 
            'examines'      => 'Link soal UTS UAS'],
            ['overview'     => 'Shortcut. Memahami cara penggunaan tools merupakan kewajiban agar bisa memahami materi-materi keuangan. Shortcut dari Excel begitu banyaknya, tetapi hanya sebagian kecil saja yang mungkin akan sering dipakai saat bekerja. ',
            'title'         => 'Section 1 Excel',
            'module_id'     => '1',
            'ticket_type_id'    => 3,
            'instruction'   => '1. Kerjakan pre-test terlebih dahulu sebagai tes dasar pengetahuan Anda terkait shortcut di Excel. 2. Tonton video pembelajaran. 3. Baca knowledge wajib yang juga perlu diketahui. 4. Kerjakan pos-test sebagai tes akhir.', 
            'knowledge'     => 'Buatlah latihan Excel dan isikan dengan Sum.', 
            'examines'      => 'Link soal UTS UAS'],
            
        ];

        DB::table('sections')->insert($section);
    }
}
