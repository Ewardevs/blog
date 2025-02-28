<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;


class PostObserver
{

    public function creating(Post $post): void
    {

        if (! \App::runningInConsole()){

            $post->user_id = auth()->user()->id;
        }
    }




    public function deleting(Post $post): void
    {
        if ($post->image){
            Storage::disk('public')->delete($post->image->url);
                $post->image()->delete();
        }
    }

}