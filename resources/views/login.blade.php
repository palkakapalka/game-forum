<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
<div class="head-div"><h2>Login</h2>

    <form action="/login" method="POST">
        @csrf
        <div>
            <label>Username</label>
            <input type="text" name="loginname">
        </div>
        <div>
            <label>Password</label>
            <input type="text" name="loginpassword">
        </div>
        <button type="submit">Login</button>
    </form>
    <a href="/">Back</a>
</div>

</body>
</html>
