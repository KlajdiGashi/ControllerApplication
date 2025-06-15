<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Register</title>
</head>
<body>
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