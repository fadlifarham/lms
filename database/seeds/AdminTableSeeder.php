<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'name'  => 'Admin',
            'email' => 'admin@bisniskita.com',
            'password'  => bcrypt('sandiaman'),
        ]);
    }
}
