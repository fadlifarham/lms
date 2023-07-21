<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ticket = [
            ['modul_id' => 1, 'user_id' => 0, 'ticket_type_id' => 1, 'start_date' => Carbon::now(), 'end_date' => Carbon::parse('2020-12-12'), 'progress_in_module' => 0, 'progress_in_section' => 0, 'certificate'   => 'https://docs.google.com/document/d/1JHMJIHFNt3RTUct_y1LMvTmeFLv4yknHfGOQ71Gm4Og/edit?usp=sharing', 'sertifikasi_chance' => 3, 'hot_chance' => 3],
            ['modul_id' => 1, 'user_id' => 0, 'ticket_type_id' => 1, 'start_date' => Carbon::now(), 'end_date' => Carbon::parse('2020-12-12'), 'progress_in_module' => 0, 'progress_in_section' => 0, 'certificate'   => 'https://docs.google.com/document/d/1JHMJIHFNt3RTUct_y1LMvTmeFLv4yknHfGOQ71Gm4Og/edit?usp=sharing', 'sertifikasi_chance' => 3, 'hot_chance' => 3],
            ['modul_id' => 1, 'user_id' => 0, 'ticket_type_id' => 1, 'start_date' => Carbon::now(), 'end_date' => Carbon::parse('2020-12-12'), 'progress_in_module' => 0, 'progress_in_section' => 0, 'certificate'   => 'https://docs.google.com/document/d/1JHMJIHFNt3RTUct_y1LMvTmeFLv4yknHfGOQ71Gm4Og/edit?usp=sharing', 'sertifikasi_chance' => 3, 'hot_chance' => 3],
            ['modul_id' => 1, 'user_id' => 0, 'ticket_type_id' => 1, 'start_date' => Carbon::now(), 'end_date' => Carbon::parse('2020-12-12'), 'progress_in_module' => 0, 'progress_in_section' => 0, 'certificate'   => 'https://docs.google.com/document/d/1JHMJIHFNt3RTUct_y1LMvTmeFLv4yknHfGOQ71Gm4Og/edit?usp=sharing', 'sertifikasi_chance' => 3, 'hot_chance' => 3],
            ['modul_id' => 1, 'user_id' => 0, 'ticket_type_id' => 1, 'start_date' => Carbon::now(), 'end_date' => Carbon::parse('2020-12-12'), 'progress_in_module' => 0, 'progress_in_section' => 0, 'certificate'   => 'https://docs.google.com/document/d/1JHMJIHFNt3RTUct_y1LMvTmeFLv4yknHfGOQ71Gm4Og/edit?usp=sharing', 'sertifikasi_chance' => 3, 'hot_chance' => 3],
            ['modul_id' => 1, 'user_id' => 0, 'ticket_type_id' => 1, 'start_date' => Carbon::now(), 'end_date' => Carbon::parse('2020-12-12'), 'progress_in_module' => 0, 'progress_in_section' => 0, 'certificate'   => 'https://docs.google.com/document/d/1JHMJIHFNt3RTUct_y1LMvTmeFLv4yknHfGOQ71Gm4Og/edit?usp=sharing', 'sertifikasi_chance' => 3, 'hot_chance' => 3],
            ['modul_id' => 1, 'user_id' => 0, 'ticket_type_id' => 1, 'start_date' => Carbon::now(), 'end_date' => Carbon::parse('2020-12-12'), 'progress_in_module' => 0, 'progress_in_section' => 0, 'certificate'   => 'https://docs.google.com/document/d/1JHMJIHFNt3RTUct_y1LMvTmeFLv4yknHfGOQ71Gm4Og/edit?usp=sharing', 'sertifikasi_chance' => 3, 'hot_chance' => 3],
            ['modul_id' => 1, 'user_id' => 0, 'ticket_type_id' => 1, 'start_date' => Carbon::now(), 'end_date' => Carbon::parse('2020-12-12'), 'progress_in_module' => 0, 'progress_in_section' => 0, 'certificate'   => 'https://docs.google.com/document/d/1JHMJIHFNt3RTUct_y1LMvTmeFLv4yknHfGOQ71Gm4Og/edit?usp=sharing', 'sertifikasi_chance' => 3, 'hot_chance' => 3],
            ['modul_id' => 1, 'user_id' => 0, 'ticket_type_id' => 1, 'start_date' => Carbon::now(), 'end_date' => Carbon::parse('2020-12-12'), 'progress_in_module' => 0, 'progress_in_section' => 0, 'certificate'   => 'https://docs.google.com/document/d/1JHMJIHFNt3RTUct_y1LMvTmeFLv4yknHfGOQ71Gm4Og/edit?usp=sharing', 'sertifikasi_chance' => 3, 'hot_chance' => 3],
            ['modul_id' => 1, 'user_id' => 0, 'ticket_type_id' => 1, 'start_date' => Carbon::now(), 'end_date' => Carbon::parse('2020-12-12'), 'progress_in_module' => 0, 'progress_in_section' => 0, 'certificate'   => 'https://docs.google.com/document/d/1JHMJIHFNt3RTUct_y1LMvTmeFLv4yknHfGOQ71Gm4Og/edit?usp=sharing', 'sertifikasi_chance' => 3, 'hot_chance' => 3],
        ];

        DB::table('tickets')->insert($ticket);

    }
}
