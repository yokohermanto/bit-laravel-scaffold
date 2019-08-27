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
        $menu["master_data"]->ikon = "icon-home";
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

        $menu["master_data"]["role"] = new \App\Menu();
        $menu["master_data"]["role"]->nama = "Role";
        $menu["master_data"]["role"]->p_id = $menu["master_data"]->id;;
        $menu["master_data"]["role"]->hak_akses_id = \App\Permission::where("nama", "manajemen-role")->first()->id;
        $menu["master_data"]["role"]->ikon = "icon-people";
        $menu["master_data"]["role"]->url = "master-data/role";
        $menu["master_data"]["role"]->tipe = "menu";
        $menu["master_data"]["role"]->urutan = 4;
        $menu["master_data"]["role"]->save();

        $menu["master_data"]["test"] = new \App\Menu();
        $menu["master_data"]["test"]->nama = "Test";
        $menu["master_data"]["test"]->p_id = $menu["master_data"]->id;
        $menu["master_data"]["test"]->hak_akses_id = null;
        $menu["master_data"]["test"]->ikon = "icon-layers";
        $menu["master_data"]["test"]->url = "master-data/test";
        $menu["master_data"]["test"]->tipe = "menu";
        $menu["master_data"]["test"]->urutan = 5;
        $menu["master_data"]["test"]->save();

        $menu["master_data"]["konfigurasi"] = new \App\Menu();
        $menu["master_data"]["konfigurasi"]->nama = "Konfigurasi";
        $menu["master_data"]["konfigurasi"]->p_id = $menu["master_data"]->id;;
        $menu["master_data"]["konfigurasi"]->hak_akses_id = null;
        $menu["master_data"]["konfigurasi"]->ikon = "icon-wrench";
        $menu["master_data"]["konfigurasi"]->url = "#";
        $menu["master_data"]["konfigurasi"]->tipe = "menu";
        $menu["master_data"]["konfigurasi"]->urutan = 6;
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

        $menu["master_data"]["konfigurasi"]["backup"] = new \App\Menu();
        $menu["master_data"]["konfigurasi"]["backup"]->nama = "Backup";
        $menu["master_data"]["konfigurasi"]["backup"]->p_id = $menu["master_data"]["konfigurasi"]->id;
        $menu["master_data"]["konfigurasi"]["backup"]->hak_akses_id = null;
        $menu["master_data"]["konfigurasi"]["backup"]->ikon = "icon-layers";
        $menu["master_data"]["konfigurasi"]["backup"]->url = "/konfigurasi/backup";
        $menu["master_data"]["konfigurasi"]["backup"]->tipe = "menu";
        $menu["master_data"]["konfigurasi"]["backup"]->urutan = 2;
        $menu["master_data"]["konfigurasi"]["backup"]->save();

        $menu["master_data"]["konfigurasi"]["example"] = new \App\Menu();
        $menu["master_data"]["konfigurasi"]["example"]->nama = "Example";
        $menu["master_data"]["konfigurasi"]["example"]->p_id = $menu["master_data"]["konfigurasi"]->id;
        $menu["master_data"]["konfigurasi"]["example"]->hak_akses_id = null;
        $menu["master_data"]["konfigurasi"]["example"]->ikon = "icon-layers";
        $menu["master_data"]["konfigurasi"]["example"]->url = "#";
        $menu["master_data"]["konfigurasi"]["example"]->tipe = "menu";
        $menu["master_data"]["konfigurasi"]["example"]->urutan = 1;
        $menu["master_data"]["konfigurasi"]["example"]->save();

        $menu["master_data"]["konfigurasi"]["example"]["submit"] = new \App\Menu();
        $menu["master_data"]["konfigurasi"]["example"]["submit"]->nama = "Submit";
        $menu["master_data"]["konfigurasi"]["example"]["submit"]->p_id = $menu["master_data"]["konfigurasi"]["example"]->id;
        $menu["master_data"]["konfigurasi"]["example"]["submit"]->hak_akses_id = null;
        $menu["master_data"]["konfigurasi"]["example"]["submit"]->ikon = "icon-layers";
        $menu["master_data"]["konfigurasi"]["example"]["submit"]->url = "/konfigurasi/example/submit";
        $menu["master_data"]["konfigurasi"]["example"]["submit"]->tipe = "menu";
        $menu["master_data"]["konfigurasi"]["example"]["submit"]->urutan = 1;
        $menu["master_data"]["konfigurasi"]["example"]["submit"]->save();
    }
}
