<!DOCTYPE html>
<html>
<head><title>Home</title></head>
<body>
    <h1>Hello, {{ $user->name }}!</h1>
    <p>You are logged in successfully.</p>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
