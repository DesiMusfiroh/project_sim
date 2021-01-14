<?php

use Illuminate\Database\Seeder;

class FacultyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `faculties` (`id`, `university_id`, `name`, `created_at`, `updated_at`) VALUES
        ('2', '1', 'Fakultas Teknik', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('3', '1', 'Fakultas Ilmu Keolahragaan', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('4', '1', 'Fakultas Teknologi Pertanian', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('5', '1', 'Fakultas Ilmu Budaya', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('6', '1', 'Fakultas Ilmu Sosial dan Politik', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('7', '1', 'Fakultas Kedokteran dan Ilmu Kesehatan', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('8', '1', 'Fakultas Sains dan Teknologi', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('9', '1', 'Fakultas Peternakan', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('10', '1', 'Fakultas Pertanian', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('11', '1', 'Fakultas Ekonomi dan Bisnis', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('12', '1', 'Fakultas Hukum', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('13', '1', 'Fakultas Keguruan dan Ilmu Pendidikan', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('14', '1', 'Fakultas Kehutanan', '2019-12-17 00:00:00', '2019-12-17 00:00:00');
        ");
    }
}
