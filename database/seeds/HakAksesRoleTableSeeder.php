<?php

use Illuminate\Database\Seeder;

class HakAksesRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionRoot = \App\Permission::pluck("id");
        $root = \App\Role::where("nama", "root")->first();
        $root->attachPermissions($permissionRoot);

        $permissionAdmin= \App\Permission::whereIn("modul", [
            "pengguna"
        ])->pluck("id");
        $admin = \App\Role::where("nama", "admin")->first();
        $admin->attachPermissions($permissionAdmin);
    }
}
