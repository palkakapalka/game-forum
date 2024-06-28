<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function showPostScreen(Post $post){
        return view('view-post',['post' => $post]);
    }

    public function deletePost(Post $post){

        if(auth()->user()->id === $post['user_id'] || auth()->user()->userType === 'admin' ){

            $post->delete();
        }
        return redirect('/');
    }

    public function updatePost(Post $post, Request $request){
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }
        $incomingFilds = $request->validate([
            'title'=>'required',
            'body'=>'required',
            'ImagePath'=>'max:1048'
        ]);
            $incomingFilds['title'] = strip_tags($incomingFilds['title']);
            $incomingFilds['body'] = strip_tags($incomingFilds['body']);

            if ($request->hasFile('ImagePath')) {
                // Удаление старого изображения, если оно есть
                if ($post->image_path) {
                    Storage::delete($post->image_path);
                }
                $incomingFilds['image_path'] = $request->file('ImagePath')->store('profile_images', 'public');

            }
            //dd($incomingFilds);
            $post->update($incomingFilds);
            return redirect('/');

    }
    public function showEditScreen(Post $post){
        if(auth()->user()->id !== $post['user_id']){
            return redirect('index');
        }
        return view('edit-post',['post' => $post]);

    }


    public function createPost(Request $request){
        $incomingFilds = $request->validate([
            'title'=>'required',
            'body'=>'required',
            'ImagePath'=>'max:1048'
        ]);
        $incomingFilds['title'] = strip_tags($incomingFilds['title']);
        $incomingFilds['body'] = strip_tags($incomingFilds['body']);
        $incomingFilds['user_id'] = auth()->id();

        if ($request->hasFile('ImagePath')) {
            // Сохранение нового изображения
            $incomingFilds['image_path'] = $request->file('ImagePath')->store('profile_images', 'public');
        }
        //dd($incomingFilds);
        Post::create($incomingFilds);
        return redirect('/');

    }

    }
