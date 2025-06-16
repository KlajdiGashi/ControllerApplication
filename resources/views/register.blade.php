<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Register</title>
</head>
       <style>
           body {
               background-color: #f4f6f9;
               font-family: Arial, sans-serif;
               display: flex;
               justify-content: center;
               align-items: center;
               height: 100vh;
               margin: 0;
           }
           .register-container {
               background: white;
               padding: 30px 40px;
               border-radius: 8px;
               box-shadow: 0 4px 10px rgba(0,0,0,0.1);
               width: 100%;
               max-width: 450px;
           }
           h2 {
               text-align: center;
               color: #333;
           }
           form input[type="text"],
           form input[type="email"],
           form input[type="password"],
           form input[type="number"] {
               width: 100%;
               padding: 10px;
               margin-top: 12px;
               margin-bottom: 8px;
               border: 1px solid #ccc;
               border-radius: 5px;
           }
           label {
               margin-right: 10px;
           }
           form input[type="radio"] {
               margin-right: 5px;
           }
           button {
               width: 100%;
               padding: 10px;
               background-color: #28a745;
               color: white;
               border: none;
               border-radius: 5px;
               cursor: pointer;
               margin-top: 12px;
           }
           button:hover {
               background-color: #218838;
           }
           ul {
               padding-left: 20px;
           }
           p {
               text-align: center;
               margin-top: 15px;
           }
           a {
               color: #007bff;
               text-decoration: none;
           }
           a:hover {
               text-decoration: underline;
           }
       </style>
<body>
<div class="register-container">
    <h2>Register</h2>

    @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    @endif

       <form action="/register" method="POST">
       @csrf
       <input type="text" name="name" placeholder="Name" required><br>
       <input type="email" name="email" placeholder="Email" required><br>
       <input type="password" name="password" placeholder="Password" required><br>
       <input name="age" type="number" placeholder="Age" required><br>
       <label><input type="radio" name="gender" value="M" required> M</label>
       <label><input type="radio" name="gender" value="F" required> F</label><br>
       <button type="submit" >Register</button>
       </form>
       <p>Already have an account? <a href="/login">Login here</a></p>
</body>
</html>