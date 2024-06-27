<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <h1>Edit Post</h1>
    <form action="/edit-post/{{$post->id}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Title</label><br>
            <input type="text" name="title" value="{{$post->title}}">
        </div>
        <div>
            <label>Texts</label><br>
            <textarea name="body" cols="35" rows="20" >{{$post->body}}"</textarea><br>
        </div>
        <br>
        <button >Save Changes</button>
    </form>
</div>

</body>
</html>
