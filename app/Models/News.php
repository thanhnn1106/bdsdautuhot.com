<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class News extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

    public static function getList($params = array())
    {
        $result = DB::table('news AS n')
            ->select('n.*', 'p.name AS project_name')
            ->leftjoin('projects AS p', 'n.project_id', '=', 'p.id')
            ->paginate(LIMIT_ROW);

        return $result;
    }

    public static function getProjectShortNameList($params = array())
    {
        $result = Project::select('short_name', 'slug')
            ->where('is_menu', '=', 1)
            ->get();
        return $result;
    }
}
