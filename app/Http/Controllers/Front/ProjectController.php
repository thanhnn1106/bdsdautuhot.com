<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Front\BaseController;
use Illuminate\Http\Request;

class ProjectController extends BaseController
{
    public function index(Request $request, $slug)
    {
        return view('front.project');
    }

}