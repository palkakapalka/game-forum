<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@can('viewAdminSection', Auth::user())

            <a href="/admin-post">All Post</a>
            <h2>All Users</h2>
            @foreach ($users as $user)
            <div class="user_list">
                <h5>{{ $user['name'] }}</h5>
                <p>{{ $user['email'] }}</p>
                <p>{{ $user['userType'] }}</p>
                <p><a href="edit-users/{{$user->id}}">Edit</a></p>
                <form action="/delete-user/{{$user->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
        @endforeach
            @else
                <p>You are a regular user.</p>
            @endcan

</body>
</html>
