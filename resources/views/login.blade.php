<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
   
</head>
<body>
    @if(request('success'))
    <div style="color: green; font-weight: bold;">
        {{ request('success') }}
    </div>
@endif

    
    <form action="/login" method="POST">
        @csrf
        <h2>Login Form</h2>
        <input type="text" name="email" placeholder="Enter your email">
        <br> <br>
        <input type="password" name="password" placeholder="Enter your password">
        <br> <br>
        <a href="http://127.0.0.1:8000/resetPassword">Forgot password?</a>
        <button type="submit">Login</button>

        <br><br>
        <a href="http://127.0.0.1:8000">You don't have an account yet? Register now</a>
    </form>
</body>
</html>

 <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        input, select, button {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            margin-bottom: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        a {
            display: block;
            text-align: center;
            color: #555;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
       
        </style>