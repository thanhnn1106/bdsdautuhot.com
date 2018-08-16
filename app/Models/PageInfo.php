<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageInfo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'page_info';

    public static function getPageInfo($params = array())
    {
        $result = PageInfo::all()->first();
        return $result;
    }

}
