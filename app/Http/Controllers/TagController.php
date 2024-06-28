<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class TagController extends Controller
{
     public function create()
    {
        return view('create_tag');
    }
    public function store(Request $request)
    {
        // Валидация данных
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:tags,name',
        ]);

        // Создание нового тега
        Tag::create($data);

        // Перенаправление с сообщением об успехе
        return redirect()->route('tags.create')->with('success', 'Tag created successfully');
    }

    public function edit(Post $post)
    {
        // Получение всех тегов из базы данных
        $tags = Tag::all();

        // Загрузка связанных тегов и передача данных в представление
        $post->load('tags');
        return view('posts.edit', compact('post', 'tags'));
    }

}
