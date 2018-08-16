<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Front\BaseController;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectInfo;

class ProjectController extends BaseController
{
    public function index(Request $request, $slug)
    {
        $data = [];
        $project = Project::select('id')->where('slug', '=', $slug)->first();
        if (empty($project)) {
            return redirect()->route('error');
        }
        $projectInfo = ProjectInfo::where('project_id', '=', $project->id)->get();
        $data = [
            'projectInfo' => $projectInfo
        ];

        return view('front.project', $data);
    }

}