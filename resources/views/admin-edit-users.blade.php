<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@can('viewAdminSection', Auth::user())
    <form action="/edit-user/{{$user->id}}" method="POST">
        @csrf
        @method('PUT')
        <label>User Name:</label><br>
        <input type="text" name="name" value="{{ old('name', $user->name) }}"><br><br>

        <label>Email:</label><br>
        <input type="text" name="email" value="{{ old('email', $user->email) }}"><br><br>

        <p>Please select User Type</p>
        <input type="radio" name="userType" value="admin" {{ old('userType', $user->userType) == 'admin' ? 'checked' : '' }}>
        <label>Admin</label><br>

        <input type="radio" name="userType" value="creater" {{ old('userType', $user->userType) == 'creater' ? 'checked' : '' }}>
        <label>Creater</label><br>

        <input type="radio" name="userType" value="user" {{ old('userType', $user->userType) == 'user' ? 'checked' : '' }}>
        <label>User</label><br><br>

        <button type="submit">Save</button>
    </form>
@else
    <p>You are a regular user.</p>
@endcan

</body>
</html>
