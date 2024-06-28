<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/view_post.css') }}">
</head>
<body>
<h1>{{$post->title}}</h1>
<p>{{$post->body}}</p>

<div>
    @if($post->ImagePath)
        <p>Profile Image:</p>
        <img src="{{asset('storage/' .$post->ImagePath) }}" alt="Profile Image" width="1000px">
    @else
        <p>No profile image available.</p>
    @endif

    <form action="/create_commit/{{$post->id}}" method="POST">
        @csrf
        <label>Comment Texts</label><br>
        <textarea name="body" cols="35" rows="20" placeholder="Texts......"></textarea><br>
        <button type="submit">Save</button>   <a href="/">Back</a>
    </form>
</div>
<h2>Tags</h2>
    @foreach($post->tags as $tag)
        <p>{{ $tag->name }}</p>
    @endforeach

<div class="comments-section">
    <h2>Comments</h2>

    @foreach($post->comments as $comment)
        <div class="comment">
            <p class="username">{{ $comment->user->name }}</p>
            <p class="comment-text">{{ $comment->body }}</p>
        </div>
    @endforeach

</div>

</body>
</html>
