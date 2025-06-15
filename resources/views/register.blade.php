<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
     
</head>
<body>

    <form action="/register" method="POST" >
        @csrf
         <h2 >Register Form</h2>
        <input type="text" name="name" placeholder="Enter your name" required>
        <br> <br>
        <input type="text" name="email" placeholder="Enter your email" >
          <br> <br>
        <input type="password" name="password" placeholder="Enter your password">
        <br> <br>
            <select  name="gender" >
            
              <option value="male">Male</option>
              <option value="female">Female</option>
            
            </select>
        <br> <br>
        <input type="number" name="age" placeholder="Enter your age">
          <br> <br>
        <button type="submit">Register</button>
        <br> <br>
<a href="http://127.0.0.1:8000/login">Already have an account? Log in </a>
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