<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
	$this->command->info(\DB::table('schools')->min('id'));
        \App\Models\School::factory(2)->create();
	\App\Models\Student::factory(3)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
	     'email' => 'test@example.com',
	     'api_token' => 'testtoken'
         ]);
    }
}
