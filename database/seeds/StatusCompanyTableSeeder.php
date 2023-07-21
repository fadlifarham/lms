<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusCompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status_company = [
            [
                'name' => 'Koordinator',
            ],
            [
                'name' => 'Peserta',
            ],
        ];
        DB::table('status_company')->insert($status_company);
    }
}
