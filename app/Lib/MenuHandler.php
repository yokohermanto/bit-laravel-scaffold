<?php
/**
 * Created by PhpStorm.
 * User: Cacing
 * Date: 21/08/2019
 * Time: 0:07
 */

namespace App\Lib;


use App\Menu;

ini_set('xdebug.max_nesting_level' , 8088);

class MenuHandler
{
    protected $menu;
    protected $nav = "";

    public function __construct()
    {
        $data = Menu::query()
            ->orderBy("id" , "ASC");

        $this->menu = $this->nested($data->get());
    }

    private function nested($tree , $root = null)
    {
        $return = [];
        foreach ($tree as $child => $parent) {
            if ($parent['p_id'] == $root) {
                unset($tree[$child]);
                $return[] = [
                    'id' => $parent['id'] ,
                    'nama' => $parent['nama'] ,
                    'p_id' => $parent['p_id'] ,
                    'hak_akses' => null ,
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

    public function buildNavArray($arr)
    {
        foreach ($arr as $index => $menu) {
            $link_sub = isset($menu['sub']) && is_array($menu['sub']) ? true : false;

            if (strtolower($menu["tipe"]) == "heading") {
                $this->nav .= "
                        <li class='nav-title'>
                            {$menu['nama']}
                        </li>";

                if ($link_sub) {
                    $this->buildNavArray($menu["sub"]);
                } else {
                    $this->nav .= "
                                <li class='nav-item'>
                                    <a class='nav-link' href='{$menu["url"]}'>
                                        <i class='nav-icon {$menu["ikon"]}'></i> {$menu["nama"]}
                                    </a>
                                </li>";
                }
            } else {
                if ($link_sub) {
                    $this->nav .= "<li class='nav-item nav-dropdown'>";
                    $this->nav .= "<a class='nav-link nav-dropdown-toggle' href='#'>
                                        <i class='nav-icon {$menu["ikon"]}'></i> {$menu["nama"]}
                                    </a>";
                    $this->nav .= "<ul class='nav-dropdown-items'>";
                    $this->buildNavArray($menu["sub"]);
                    $this->nav .= "</ul>";
                    $this->nav .= "</li>";
                } else {
                    $this->nav .= "
                                <li class='nav-item'>
                                    <a class='nav-link' href='{$menu["url"]}'>
                                        <i class='nav-icon {$menu["ikon"]}'></i> {$menu["nama"]}
                                    </a>
                                </li>";
                }
            }
        }
    }

    public function getNav()
    {
        return $this->nav;
    }

}
