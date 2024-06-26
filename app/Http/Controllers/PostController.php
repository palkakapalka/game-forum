<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request){
        $incomingFilds = $request->validate([
            'title'=>'required',
            'body'=>'required'
        ]);
        $incomingFilds['title'] = strip_tags($incomingFilds['title']);
        $incomingFilds['body'] = strip_tags($incomingFilds['body']);
        $incomingFilds['user_id'] = auth()->id();
        Post::create($incomingFilds);
        return redirect('/');

    }
 
}
