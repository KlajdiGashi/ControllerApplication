<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/resetPassword" method="POST">
    @csrf
    <h2>Change password form</h2>
    <input type="text" name="email" placeholder="Enter your email">
    <input type="password" name="newPassword" placeholder="Enter your new password" >
    <input type="password" name="confirmNewPassword" placeholder="Confirm new password" >
    <button type="submit">Reset password</button>
    <a href="/login">Back to Login</a>
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