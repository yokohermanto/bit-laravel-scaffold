<?php
/**
 * Created by PhpStorm.
 * User: Cacing
 * Date: 21/08/2019
 * Time: 0:07
 */

namespace App\Lib;


use Illuminate\Support\Facades\DB;

class MenuHandler
{
    protected $menu;
    protected $nav = "";

    public function __construct()
    {
        $data = DB::table("menu as m")
            ->select("m.*" , "p.nama as hak_akses")
            ->leftJoin("permission as p" , "m.hak_akses_id" , "p.id")
            ->orderBy("m.id" , "ASC");

        $this->menu = $this->nested($data->get()->toArray());
    }

    private function nested($tree , $root = null)
    {
        $return = [];
        foreach ($tree as $child => $parent) {
            $parent = (array)$parent;
            if ($parent['p_id'] == $root) {
                unset($tree[$child]);
                $return[] = [
                    'id' => $parent['id'] ,
                    'nama' => $parent['nama'] ,
                    'p_id' => $parent['p_id'] ,
                    'hak_akses' => $parent["hak_akses"] ,
                    'ikon' => $parent['ikon'] ,
                    'url' => $parent['url'] ,
                    'segment' => $parent['segment'] ,
                    'tipe' => $parent['tipe'] ,
                    'urutan' => $parent['urutan'] ,
                    'sub' => $this->nested($tree , $parent['id'])
                ];
            }
        }
        return empty($return) ? null : $return;
    }

    public function buildNav()
    {
        return $this->buildNavArray($this->menu);
    }

    private function buildNavArray($arr)
    {
        foreach ($arr as $index => $menu) {
            $link_sub = isset($menu['sub']) && is_array($menu['sub']) ? true : false;
            if ($menu["hak_akses"] == null) {
                if (strtolower($menu["tipe"]) == "heading") {
                    $this->nav .= $this->buildNavTitle($menu["nama"]);

                    if ($link_sub) {
                        $this->buildNavArray($menu["sub"]);
                    } else {
                        $this->nav .= $this->buildNavItem($menu["url"] , $menu["ikon"] , $menu["nama"]);
                    }
                } else {
                    if ($link_sub) {
                        $this->nav .= $this->buildNavSubBegin($menu["nama"], $menu["ikon"]);
                        $this->buildNavArray($menu["sub"]);
                        $this->nav .= $this->buildNavSubEnd();
                    } else {
                        $this->nav .= $this->buildNavItem($menu["url"] , $menu["ikon"] , $menu["nama"]);
                    }
                }
            } else {
                if (auth()->user()->can($menu["hak_akses"])) {
                    if (strtolower($menu["tipe"]) == "heading") {
                        $this->nav .= $this->buildNavTitle($menu["nama"]);

                        if ($link_sub) {
                            $this->buildNavArray($menu["sub"]);
                        } else {
                            $this->nav .= $this->buildNavItem($menu["url"] , $menu["ikon"] , $menu["nama"]);
                        }
                    } else {
                        if ($link_sub) {
                            $this->nav .= $this->buildNavSubBegin($menu["nama"], $menu["ikon"]);
                            $this->buildNavArray($menu["sub"]);
                            $this->nav .= $this->buildNavSubEnd();
                        } else {
                            $this->nav .= $this->buildNavItem($menu["url"] , $menu["ikon"] , $menu["nama"]);
                        }
                    }
                }
            }
        }
    }

    private function buildNavTitle($name)
    {
        return "
                <li class='nav-title'>
                    {$name}
                </li>";
    }

    private function buildNavItem($url , $icon , $name)
    {
        return "
            <li class='nav-item'>
                <a class='nav-link' href='{$url}'>
                    <i class='nav-icon {$icon}'></i> {$name}
                </a>
            </li>";
    }

    public function getNav()
    {
        return $this->nav;
    }

    private function buildNavSubBegin($name , $icon)
    {
        return "<li class='nav-item nav-dropdown'>
                    <a class='nav-link nav-dropdown-toggle' href='#'>
                    <i class='nav-icon {$icon}'></i> {$name}
                </a> <ul class='nav-dropdown-items'>";
    }

    private function buildNavSubEnd()
    {
        return "</ul></li>";
    }

}
