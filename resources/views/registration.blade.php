<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/registration.css') }}">
</head>
<body>
<div class="head-div">
<h2>Fill registration form</h2>
    <form action="/registration" method="POST">
        @csrf
        <label>User Name:</label><br>
        <input type="text" name="name" placeholder="name"><br><br>
        <label>Email:</label><br>
        <input type="text" name="email" placeholder="email"><br><br>
        <label>Password:</label><br>
        <input type="text" name="password" placeholder="password"><br><br>
   <button type="submit">Registration</button>
    </form>
</div>
</body>
</html>
