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
    <h2>Comments</h2>
    @foreach($post->comments as $comments)
        <p>{{ $comments->body }}</p>
        <p>By: {{ $comments->user->name }}</p>
    @endforeach
    <form action="/create_commit/{{$post->id}}" method="POST">
        @csrf
            <label>Texts</label><br>
            <textarea name="body" cols="35" rows="20"  placeholder="Texts......"></textarea><br>
        </div>
        <button type="submit">Save</button>
    </form>
</div>



</body>
</html>

