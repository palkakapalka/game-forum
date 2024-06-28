<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Tag</title>
</head>
<body>
<h1>Create Tag</h1>
    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <label for="name">Tag Name:</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required><br><br>
        <button type="submit">Create Tag

</body>
</html>
