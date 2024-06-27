<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>{{$post->title}}</h1>
<p>{{$post->body}}</p>
<div>
@if($post->ImagePath)
<p>Profile Image:</p>
    <img src="{{asset('storage/' .$post->ImagePath) }}" alt="ffff" width="1000px">
    @else
        <p>No profile image available.</p>
    @endif
</div>



</body>
</html>

