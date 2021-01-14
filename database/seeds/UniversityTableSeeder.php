<?php

use Illuminate\Database\Seeder;

class UniversityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO 'universities' ('id', 'name', 'created_at', 'updated_at') VALUES
        ('1', 'Universitas Jambi', '2019-12-17 00:00:00', '2019-12-17 00:00:00');
        ");
    }
}
