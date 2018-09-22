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

    public static function getProjectListHomePage($params = array())
    {
        $result = DB::table('projects AS p')->select('p.*', 'pi.*')
            ->leftjoin('project_info AS pi', 'pi.project_id', '=', 'p.id')
            ->where('p.is_show_homepage', '=', 1)
            ->get()->toArray();
//        echo "<pre>";print_r($result);exit;
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
