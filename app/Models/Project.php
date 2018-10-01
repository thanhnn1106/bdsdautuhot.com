<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Project extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';

    public static function getList($params = array())
    {
        $result = Project::paginate(LIMIT_ROW);
        return $result;
    }

    public static function getProjectListHomePageNew($params = array())
    {
        $result = DB::table('projects AS p')->select('p.*')
            ->where('p.status', '=', 1)
            ->where('p.is_new', '=', 1)
            ->get()->toArray();

        return $result;
    }

    public static function getProjectListHomePage($params = array())
    {
        $result = DB::table('projects AS p')->select('p.*')
            ->where('p.status', '=', 1)
            ->where('p.is_show_homepage', '=', 1)
            ->get()->toArray();

        return $result;
    }

    public static function getProjectShortNameList($params = array())
    {
        $result = Project::select('short_name', 'cover_photo', 'slug')
            ->where('status', '=', 1)
            ->whereAnd('is_menu', '=', 1)
            ->get();
        return $result;
    }
}
