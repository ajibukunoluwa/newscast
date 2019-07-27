<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogUpdateRequest;

use App\Models\Blog;
use App\Models\User;

class SettingsController extends Controller
{
    
    public function edit (Blog $blog)
    {

        $this->authorize('edit' , $blog);
        return view('blog.settings.edit' , [
            'blog'   => $blog
        ]);
    }

    public function update (BlogUpdateRequest $request , Blog $blog)
    {
        $this->authorize('update' , $blog);

        $blog->update([

            "name"  => $request->name,
            "slug"  => $request->slug,
            "description"  => $request->description,

        ]);

        if($request->hasFile('blog_image'))
        {
            $this->storeImage($request->file('blog_image') , $request->slug);
        }
        
        
        return redirect()->to("/blog/{$blog->slug}/edit");
    }


    private function storeImage($fileInput , $slug = null)
    {
        $extension  = $fileInput->guessExtension();
        $fileName   = $slug . '-' . uniqid(true).".{$extension}";

        return $fileInput->move(storage_path() . "/uploads/" , $fileName );
    }

}
