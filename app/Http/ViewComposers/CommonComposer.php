<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\PageInfo;
use App\Models\Project;
use App\Models\News;

class CommonComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $pageInfo = PageInfo::getPageInfo();
        $menu = Project::getProjectShortNameList();
        $news = News::getNewestPost(4);
        $hotNews = News::getHottestPost(4);

        $view->with([
            'pageInfo' => $pageInfo,
            'menu'     => $menu,
            'news'     => $news,
            'hotNews'  => $hotNews
        ]);
    }
}
