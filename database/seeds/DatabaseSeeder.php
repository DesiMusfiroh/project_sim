<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(FacultyTableSeeder::class);

        $this->call(ProdyTableSeeder::class);
        $this->call(UniversityTableSeeder::class);
        
        $this->call(UsersTableSeeder::class);
    }
}
