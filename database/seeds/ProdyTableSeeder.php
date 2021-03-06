<?php

use Illuminate\Database\Seeder;

class ProdyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `prodies` (`id`, `university_id`, `faculty_id`, `name`, `created_at`, `updated_at`) VALUES
        ('1', '1', '1' 'S1 Ilmu Kesehatan Masyarakat', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('2', '2', '2', 'S1 Teknik Elektro', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('3', '2', '2', 'S1 Teknik Kimia', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('4','1', '2','S1 Teknik Lingkungan', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('5','1', '2','S1 Teknik Sipil', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('6','1', '2','Profesi Insinyur', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('7','1', '3','S1 Kepelatihan Olahraga', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('8','1', '3','S1 Pendidikan Olahraga dan Kesehatan', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('9','1', '4','S1 Teknik Pertanian', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('10','1', '4','S1 Teknologi Hasil Pertanian', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('11','1', '4','S1 Teknologi Industri Pertanian', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('12','1', '5','S1 Arkeologi', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('13','1', '5','S1 Bahasa Arab', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('14','1', '5','S1 Ilmu Sejarah', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('15','1', '5','S1 Sastra Indonesia', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('16','1', '5','S1 Seni Drama Tari dan Musik', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('17','1', '6','D-IV Manajemen Pemerintahan', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('18','1', '6','S1 Ilmu Pemerintahan', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('19','1', '6','S1 Ilmu Politik', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('20','1', '7','S1 Ilmu Keperawatan', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('21','1', '7','S1 Kedokteran', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('22','1', '7','S1 Psikologi', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('23','1', '7','Profesi Dokter', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('24','1', '7','Profesi Ners', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('25','1', '8','D-III Analis Kimia', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('26','1', '8','D-III Kimia Industri', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('27','1', '8','S1 Biologi', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('28','1', '8','S1 Farmasi', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('29','1', '8','S1 Fisika', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('30','1', '8','S1 Kimia', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('31','1', '8','S1 Matematika', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('32','1', '8','S1 Sistem Informasi', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('33','1', '8','S1 Teknik Geofisika', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('34','1', '8','S1 Teknik Geologi', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('35','1', '8','S1 Teknik Pertambangan', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('36','1', '9','D-III Kesehatan Hewan', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('37','1', '9','D-III Teknologi Hasil Perikanan', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('38','1', '9','S1 Pemanfaatan Sumber Daya Perikanan', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('39','1', '9','S1 Peternakan', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('40','1', '10','D-III Agrobisnis', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('41','1', '10','S1 Agribisnis', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('42','1', '10','S1 Agroekoteknologi', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('43','1', '11','D-III Akuntansi', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('44','1', '11','D-III Manajemen Pemasaran', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('45','1', '11','D-III Perpajakan', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('46','1', '11','D-IV Keuangan Daerah', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('47','1', '11','S1 Akuntansi', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('48','1', '11','S1 Ekonomi Islam', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('49','1', '11','S1 Ekonomi Pembangunan', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('50','1', '11','S1 Manajemen', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('51','1', '12','S1 Ilmu Hukum', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('52','1', '13','S1 Administrasi Pendidikan', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('53','1', '13','S1 Bimbingan Dan Konseling', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('54','1', '13','S1 Pendidikan Bahasa dan Sastra Indonesia', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('55','1', '13','S1 Pendidikan Bahasa Inggris', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('56','1', '13','S1 Pendidikan Biologi', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('57','1', '13','S1 Pendidikan Ekonomi', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('58','1', '13','S1 Pendidikan Fisika', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('59','1', '13','S1 Pendidikan Guru PAUD', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('60','1', '13','S1 Pendidikan Guru Sekolah Dasar', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('61','1', '13','S1 Pendidikan Kimia', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('62','1', '13','S1 Pendidikan Matematika', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('63','1', '13','S1 Pendidikan Pancasila dan Kewarganegaraan', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('64','1', '13','S1 Pendidikan Sejarah', '2019-12-17 00:00:00', '2019-12-17 00:00:00'),
        ('65','1', '14','S1 Kehutanan', '2019-12-17 00:00:00', '2019-12-17 00:00:00');
        ");
    }
}
