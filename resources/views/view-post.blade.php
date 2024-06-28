<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/view_post.css') }}">
</head>
<body>
<div class="head-div">
    <h1>{{$post->title}}</h1>
    <p>{{$post->body}}</p>
    <div>
        @if($post->ImagePath)
            <img src="{{asset('storage/' .$post->ImagePath) }}" alt="ffff" width="1000px">
        @endif
            <a href="/">Back</a>
    </div>

</div>




</body>
</html>

