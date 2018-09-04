<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\PageInfo;
use App\Models\Project;

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

        $view->with([
            'pageInfo' => $pageInfo,
            'menu' => $menu
        ]);
    }
}
