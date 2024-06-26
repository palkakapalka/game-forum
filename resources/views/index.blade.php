<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
<div id="sidebar">
    <h3>50 newest post</h3>
    <p>1. Post title</p>
    <p>#A #B #C</p>
</div>

<div id="main-content">
    @auth
        <h2>All Posts</h2>
        @foreach ($userPost as $post)
            <div class="post_list">
                <h3>{{ $post['title'] }}</h3>
                <p>{{ $post['body'] }}</p>
            </div>
        @endforeach

        <form action="/logout" method="POST">
            @csrf
            <button type="submit">Log out</button>
        </form>
        <a href="/create_post">Create post</a>
    @else
        <div class="login">
            <a href="/registration/">Registration</a>
            <a href="/login/">Login</a>
        </div>

        <h2>All Posts</h2>
        @foreach ($posts as $post)
            <div class="post_list">
                <h3>{{ $post['title'] }}</h3>
                <p>{{ $post['body'] }}</p>
            </div>
        @endforeach
    @endauth
</div>

<div id="user-info">
    @auth
        <p class="username">{{ Auth::user()->name }}</p>
        <p class="role">{{ Auth::user()->role }}</p>
        <button>#-List</button>
    @else
        <a href="/registration/">Registration</a>
        <a href="/login/">Login</a>
    @endauth
</div>
</body>
</html>
