<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use \App\Models\News;
use \App\Models\Project;

class NewController extends Controller
{
    public function index(Request $request, $slug)
    {
        $data = [];
        $news = News::select('*')->where('slug', '=', $slug)->first();
        if (empty($news)) {
            return redirect()->route('error');
        }

        $newsUpdate = News::find($news->id);
        $newsUpdate->page_view = $newsUpdate->page_view + 1;
        $newsUpdate->save();

        $data = [
            'newsInfo' => $news
        ];

        return view('front.news', $data);
    }
}
