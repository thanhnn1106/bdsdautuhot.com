<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Front\BaseController;
use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends BaseController
{
    public function index(Request $request)
    {
        $projectList = Project::getProjectListHomePage();
        $data = [
            'projectList' => $projectList
        ];
        return view('front.index', $data);
    }

}