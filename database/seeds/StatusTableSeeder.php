<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            'name'  => 'Mahasiswa'
        ]);

        DB::table('status')->insert([
            'name'  => 'Dosen'
        ]);

        DB::table('status')->insert([
            'name'  => 'Admin'
        ]);
    }
}
