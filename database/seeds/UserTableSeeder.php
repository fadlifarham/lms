<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'      => 'Muhammad Fadli Farham',
                'email'     => 'fadli@gmail.com',
                'password'  => bcrypt('sandiaman'),
                'status_id' => 2,
                'free_ticket_taken' => 0,
            ],
            [
                'name'      => 'Admin',
                'email'     => 'admin@gmail.com',
                'password'  => bcrypt('sandiaman'),
                'status_id' => 3,
                'free_ticket_taken' => 0,
            ],
        ];
        DB::table('users')->insert($users);
    }
}
