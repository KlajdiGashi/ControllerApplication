<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/login" method="POST">
        @csrf
        <input name="loginemail" type="email" placeholder="Email" required><br>
        <input name="loginpassword" type="password" placeholder="Password" required><br>
        <button type="submit">Log In</button>
    </form>

    <p>Don't have an account? <a href="/register">Register here</a></p>
</body>
</html>
