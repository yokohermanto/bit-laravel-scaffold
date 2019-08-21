<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu["dasbor"] = new \App\Menu();
        $menu["dasbor"]->nama = "Dasbor";
        $menu["dasbor"]->p_id = null;
        $menu["dasbor"]->hak_akses_id = null;
        $menu["dasbor"]->ikon = "icon-home";
        $menu["dasbor"]->url = "/dasbor";
        $menu["dasbor"]->tipe = "menu";
        $menu["dasbor"]->urutan = 1;
        $menu["dasbor"]->save();

        $menu["master_data"] = new \App\Menu();
        $menu["master_data"]->nama = "Master Data";
        $menu["master_data"]->p_id = null;
        $menu["master_data"]->hak_akses_id = null;
        $menu["master_data"]->ikon = null;
        $menu["master_data"]->url = "#";
        $menu["master_data"]->tipe = "heading";
        $menu["master_data"]->urutan = 2;
        $menu["master_data"]->save();

        $menu["master_data"]["pengguna"] = new \App\Menu();
        $menu["master_data"]["pengguna"]->nama = "Pengguna";
        $menu["master_data"]["pengguna"]->p_id = $menu["master_data"]->id;
        $menu["master_data"]["pengguna"]->hak_akses_id = \App\Permission::where("nama", "manajemen-pengguna")->first()->id;
        $menu["master_data"]["pengguna"]->ikon = "icon-user";
        $menu["master_data"]["pengguna"]->url = "master-data/pengguna";
        $menu["master_data"]["pengguna"]->tipe = "menu";
        $menu["master_data"]["pengguna"]->urutan = 1;
        $menu["master_data"]["pengguna"]->save();

        $menu["master_data"]["menu"] = new \App\Menu();
        $menu["master_data"]["menu"]->nama = "Menu";
        $menu["master_data"]["menu"]->p_id = $menu["master_data"]->id;;
        $menu["master_data"]["menu"]->hak_akses_id = \App\Permission::where("nama", "manajemen-menu")->first()->id;
        $menu["master_data"]["menu"]->ikon = "icon-list";
        $menu["master_data"]["menu"]->url = "master-data/menu";
        $menu["master_data"]["menu"]->tipe = "menu";
        $menu["master_data"]["menu"]->urutan = 2;
        $menu["master_data"]["menu"]->save();

        $menu["master_data"]["role"] = new \App\Menu();
        $menu["master_data"]["role"]->nama = "Role";
        $menu["master_data"]["role"]->p_id = $menu["master_data"]->id;;
        $menu["master_data"]["role"]->hak_akses_id = \App\Permission::where("nama", "manajemen-role")->first()->id;
        $menu["master_data"]["role"]->ikon = "icon-people";
        $menu["master_data"]["role"]->url = "master-data/role";
        $menu["master_data"]["role"]->tipe = "menu";
        $menu["master_data"]["role"]->urutan = 3;
        $menu["master_data"]["role"]->save();

        $menu["master_data"]["konfigurasi"] = new \App\Menu();
        $menu["master_data"]["konfigurasi"]->nama = "Konfigurasi";
        $menu["master_data"]["konfigurasi"]->p_id = $menu["master_data"]->id;;
        $menu["master_data"]["konfigurasi"]->hak_akses_id = null;
        $menu["master_data"]["konfigurasi"]->ikon = "icon-wrench";
        $menu["master_data"]["konfigurasi"]->url = "#";
        $menu["master_data"]["konfigurasi"]->tipe = "menu";
        $menu["master_data"]["konfigurasi"]->urutan = 4;
        $menu["master_data"]["konfigurasi"]->save();

        $menu["master_data"]["konfigurasi"]["aplikasi"] = new \App\Menu();
        $menu["master_data"]["konfigurasi"]["aplikasi"]->nama = "Aplikasi";
        $menu["master_data"]["konfigurasi"]["aplikasi"]->p_id = $menu["master_data"]["konfigurasi"]->id;
        $menu["master_data"]["konfigurasi"]["aplikasi"]->hak_akses_id = null;
        $menu["master_data"]["konfigurasi"]["aplikasi"]->ikon = "icon-layers";
        $menu["master_data"]["konfigurasi"]["aplikasi"]->url = "/konfigurasi/aplikasi";
        $menu["master_data"]["konfigurasi"]["aplikasi"]->tipe = "menu";
        $menu["master_data"]["konfigurasi"]["aplikasi"]->urutan = 1;
        $menu["master_data"]["konfigurasi"]["aplikasi"]->save();
    }
}
