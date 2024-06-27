<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/edit_post.css') }}">
</head>
<body>
<div class="head-div">
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
            <br>
            <input type="file"  name="ImagePath" accept="image/png, image/jpeg" />
        </div>
        <br>
        <button >Save Changes</button>
    </form>
    <a href="/">Back</a>
</div>

</body>
</html>
