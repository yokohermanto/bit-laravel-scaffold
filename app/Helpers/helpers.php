<?php
if (!function_exists('seed_permission')) {
    function seed_permission($module , $pre, $desc)
    {
        $perm = new \App\Permission();
        $perm->nama = strtolower($pre)."-".strtolower($module);
        $perm->nama_tampilan = "{$pre} {$module}";
        $perm->modul = $module;
        $perm->keterangan = "{$desc} {$module}";
        $perm->save();
    }
}

if (!function_exists('seed_role')) {
    function seed_role($name ,$desc)
    {
        $role = new \App\Role();
        $role->nama = strtolower($name);
        $role->nama_tampilan = $name;
        $role->keterangan = $desc;
        $role->save();
    }
}
