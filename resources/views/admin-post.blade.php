<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@can('viewAdminSection', Auth::user())

            <a href="/admin-users">All Users</a>
            <h2>All Posts</h2>

            @else
                <p>You are a regular user.</p>
            @endcan
            @foreach ($posts as $post)
            <div class="post_list">
                <h3>{{ $post['title'] }}</h3>
                <p>{{ $post['body'] }}</p>
                <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
        @endforeach
</body>
</html>
