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
    @foreach ($posts as $post)
                <h4>{{ $post['title'] }}</h4>
                <p>Tag</p>
        @endforeach
</div>

<div id="main-content">
    @auth
        @if(Auth::user()->userType == "user")
            <h2>All Posts</h2>
            @foreach ($posts as $post)
                <a class="view-post" href="view-post/{{$post->id}}"><div class="post_list">
                        <h3>{{ $post['title'] }}</h3>
                        <p>{{ $post['body'] }}</p>
                    </div></a>
            @endforeach
        @endif
        @if(Auth::user()->userType == "admin" || Auth::user()->userType == "creater")
                <a class="switch" href="/all-posts">All Posts</a> <a class="switch" href="/create_tag">Createtags</a>
                @foreach ($userPost as $post)
                    <div class="post_list">
                        <div class="post">
                        <a class="view-post" href="view-post/{{$post->id}}"><h3>{{ $post['title'] }}</h3>
                            <p>{{ $post['body'] }}</p></a>
                        </div>
                        <div class="action">
                            <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                            <form action="/delete-post/{{$post->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>Delete</button>
                            </form>
                        </div>

                    </div>
                @endforeach

        @endif

    @else
        <h2>All Posts</h2>
        @foreach ($posts as $post)
            <a class="view-post" href="view-post/{{$post->id}}"><div class="post_list">
                <h3>{{ $post['title'] }}</h3>
                <p>{{ $post['body'] }}</p>
            </div></a>
        @endforeach
    @endauth
</div>

<div id="user-info">
    @auth
        <p class="username">{{ Auth::user()->name }}</p>
        <p class="role">{{ Auth::user()->userType }}</p>
        <form action="/logout" method="POST">
            @csrf
            <button class="logout" type="submit">Log out</button>
        </form>
        <button class="list-of-#">#-List</button>
        @if(Auth::user()->userType == "admin" || Auth::user()->userType == "creater")<a href="/create_post">Create post</a> @endif

        @if(Auth::user()->userType == "admin")<a href="/admin-users">Admin Section</a> @endif
    @else
        <a href="/registration/">Registration</a>
        <a href="/login/">Login</a>
    @endauth
</div>
</body>
</html>
