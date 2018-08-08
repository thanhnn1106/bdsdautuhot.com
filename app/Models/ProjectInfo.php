<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectInfo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'project_info';

    public static function getList($params = array())
    {
        $result = Project::paginate(LIMIT_ROW);
        return $result;
    }

}
