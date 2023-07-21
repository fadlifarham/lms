<?php

use Illuminate\Database\Seeder;

class ModuleCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('module_category')->insert([
            'category'  => 'Teknologi dan Pemrograman'
        ]);

        DB::table('module_category')->insert([
            'category'  => 'Management'
        ]);

        DB::table('module_category')->insert([
            'category'  => 'User Experience dan Gamification'
        ]);

        DB::table('module_category')->insert([
            'category'  => 'Lainnya'
        ]);
    }
}
