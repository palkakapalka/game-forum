<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Tag</title>
    <link rel="stylesheet" href="{{ asset('css/tag.css') }}">
</head>
<body>
<div class="head-div">

    <form action="{{ route('tags.store') }}" method="POST">
        <h1>Create Tag</h1>
        @csrf
        <label for="name">Tag Name:</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required><br><br>
        <button type="submit">Create Tag</button>
        <a href="/">Back</a>
    </form>

</div>

</body>
</html>
