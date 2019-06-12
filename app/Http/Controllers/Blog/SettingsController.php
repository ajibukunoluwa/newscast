<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Blog;

class SettingsController extends Controller
{
    
    public function edit (Blog $blog)
    {
        
        return view('blog.settings.edit' , [
            'blog'   => $blog
        ]);
    }

    public function update (Blog $blog)
    {

    }

}
