<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Login</h2>
    <form action="/create_post" method="POST">
    @csrf
        <div>
            <label>Title</label><br>
            <input type="text" name="title" placeholder="Title">
        </div>
        <div>
            <label>Texts</label><br>
            <textarea name="body" placeholder="Texts......"></textarea><br>
        </div>
        <button type="submit">Save</button>
    </form>
    <a href="/back">Back</a><br><br>
</body>
</html>
