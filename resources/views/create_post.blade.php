<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/create_post.css') }}">
</head>
<body>
<div class="head-div">
    <form action="/create_post" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Title</label><br>
            <input type="text" name="title" placeholder="Title">
        </div>
        <div>
            <label>Texts</label><br>
            <textarea name="body" cols="35" rows="20"  placeholder="Texts......"></textarea><br>
            <br>
            <input type="file"  name="ImagePath" accept="image/png, image/jpeg" />
                <button type="submit">Save</button>
        </div>
        <br>

    </form>
    <a href="/">Back</a>
</div>

</body>
</html>
