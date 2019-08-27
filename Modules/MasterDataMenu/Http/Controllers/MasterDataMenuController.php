<?php

namespace Modules\MasterDataMenu\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class MasterDataMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('masterdatamenu::menu_index');
    }

    public function get(Request $request)
    {
        $menu = Menu::select("*")->get();
        return $this->nested($menu);
    }

    private function nested($tree, $root = null)
    {
        $return = array();
        foreach ($tree as $child => $parent) {
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
                    'children' => $this->nested($tree , $parent['id'])
                ];
            }
        }
        return empty($return) ? null : $return;
    }

}
