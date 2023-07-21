<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(TicketTypesTableSeeder::class);
        $this->call(ModuleCategoryTableSeeder::class);
        $this->call(ModuleTableSeeder::class);
        $this->call(TicketsTableSeeder::class);
        $this->call(SectionTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(VideoTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        // $this->call(QuestionCSVTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(StatusCompanyTableSeeder::class);
        $this->call(HotQuestionsTableSeeder::class);
    }
}
