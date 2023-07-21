<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_types')->insert([
            'name'  => 'Rookie'
        ]);

        DB::table('ticket_types')->insert([
            'name'  => 'Trainee'
        ]);

        DB::table('ticket_types')->insert([
            'name'  => 'Traiser'
        ]);

        DB::table('ticket_types')->insert([
            'name'  => 'Expert'
        ]);

        DB::table('ticket_types')->insert([
            'name'  => 'Guest'
        ]);
    }
}
