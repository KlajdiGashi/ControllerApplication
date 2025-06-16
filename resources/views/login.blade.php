<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: white;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form input {
            width: 100%;
            padding: 10px;
            margin-top: 12px;
            margin-bottom: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }
        ul {
            padding-left: 20px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        p {
            text-align: center;
            margin-top: 15px;
        }
    </style>
<body>
<div class="login-container">
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
