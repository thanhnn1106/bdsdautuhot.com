<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\PageInfo;

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

        $view->with([
            'pageInfo' => $pageInfo
        ]);
    }
}
