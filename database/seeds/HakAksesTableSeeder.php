<?php

use Illuminate\Database\Seeder;

class HakAksesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        seed_permission("Pengguna", "Manajemen", "Dapat mengelola");
        seed_permission("Pengguna", "Buat", "Dapat Membuat");
        seed_permission("Pengguna", "Lihat", "Dapat Melihat");
        seed_permission("Pengguna", "Edit", "Dapat Mengedit");
        seed_permission("Pengguna", "Hapus", "Dapat Menghapus");

        seed_permission("Menu", "Manajemen", "Dapat mengelola");
        seed_permission("Menu", "Buat", "Dapat Membuat");
        seed_permission("Menu", "Lihat", "Dapat Melihat");
        seed_permission("Menu", "Edit", "Dapat Mengedit");
        seed_permission("Menu", "Hapus", "Dapat Menghapus");

        seed_permission("Role", "Manajemen", "Dapat mengelola");
        seed_permission("Role", "Buat", "Dapat Membuat");
        seed_permission("Role", "Lihat", "Dapat Melihat");
        seed_permission("Role", "Edit", "Dapat Mengedit");
        seed_permission("Role", "Hapus", "Dapat Menghapus");
    }
}
