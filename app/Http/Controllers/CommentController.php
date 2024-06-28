<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController
{

    public function show(Post $post)
    {
        $post->load('comments.user');

        return view('view-post', ['post' => $post]);
    }
    public function createComment(Request $request, Post $post ){
        $incomingFilds = $request->validate([
            'body'=>'required|string',

        ]);

        $incomingFilds['body'] = strip_tags($incomingFilds['body']);
        $incomingFilds['users_id'] = auth()->id();
        $incomingFilds['post_id'] = $post->id;
        Comment::create($incomingFilds);
        return redirect()->route('posts.show', $post->id);
}
}
