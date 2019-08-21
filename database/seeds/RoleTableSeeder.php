<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        seed_role("Root", "Level user tertinggi, dapat melakukan akses ke semua modul");
        seed_role("Admin", "Level user untuk manajemen Master Data");
    }
}
