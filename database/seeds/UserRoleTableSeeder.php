<?php

use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRoot = \App\User::whereIn("id" , [1 , 2])->get();
        $userAdmin = \App\User::whereNotIn("id" , [1 , 2])->get();

        $root = \App\Role::where("nama" , "root")->first();
        $admin = \App\Role::where("nama" , "admin")->first();

        foreach ($userRoot as $user) {
            $user->attachRole($root);
        }

        foreach ($userAdmin as $user) {
            $user->attachRole($admin);
        }
    }
}
