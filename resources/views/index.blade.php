<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.style.css">
</head>
<body>
    @auth
    <p>!!!!!!!!!!!!!!!!!!!!</p>
    <h2>All Posts</h2>
@foreach ($userPost as $post)
<div style="border: 2px solid black;">
    <h3>{{$post['title']}}</h3>
    <p>{{$post['body']}}</p>
</div>
@endforeach

    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
        <a href="/create_post">Create post</a><br><br>
    </form>
    @else
 <a href="/registration/">Registration</a><br><br>
 <a href="/login/">Login</a>

 <h2>All Posts</h2>
@foreach ($posts as $post)
<div style="border: 2px solid black;">
    <h3>{{$post['title']}}</h3>
    <p>{{$post['body']}}</p>
</div>
@endforeach
 @endauth


<div>



 </div>
</body>
</html>
