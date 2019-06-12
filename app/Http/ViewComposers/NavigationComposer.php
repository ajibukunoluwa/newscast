<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use Auth;

class NavigationComposer
{

    public function compose (View $view)
    {
        if(!$this->isLoggedIn())
        {
            return;
        }

        $view->with('blog' , Auth::user()->blog->first());
    }

    protected function isLoggedIn ()
    {
        if (Auth::check())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}