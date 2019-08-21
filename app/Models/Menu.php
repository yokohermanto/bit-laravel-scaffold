<?php
/**
 * Created by PhpStorm.
 * User: Cacing
 * Date: 21/08/2019
 * Time: 0:10
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";

    public function subs()
    {
        return $this->hasMany(Menu::class, 'p_id', 'id');
    }

}
