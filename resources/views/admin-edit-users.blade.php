<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/admin_edit_users.css') }}">
</head>
<body>
@can('viewAdminSection', Auth::user())
    <form action="/edit-user/{{$user->id}}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">User Name:</label><br>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"><br><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="{{ old('email', $user->email) }}"><br><br>

        <p>Please select User Type</p>
        <div class="role-selection">
            <input type="radio" id="admin" name="userType" value="admin" {{ old('userType', $user->userType) == 'admin' ? 'checked' : '' }}>
            <label for="admin">Admin</label>

            <input type="radio" id="creater" name="userType" value="creater" {{ old('userType', $user->userType) == 'creater' ? 'checked' : '' }}>
            <label for="creater">Creater</label>

            <input type="radio" id="user" name="userType" value="user" {{ old('userType', $user->userType) == 'user' ? 'checked' : '' }}>
            <label for="user">User</label>
        </div><br>

        <button type="submit">Save</button>
    </form>
@else
    <p>You are a regular user.</p>
@endcan

</body>
</html>
