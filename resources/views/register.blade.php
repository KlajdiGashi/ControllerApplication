<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="">
</head>
<body>
<div style = "border: 3px solid black">
<h2>Register</h2>
<form action="/register" method="POST">
@csrf
<input name = "name" type ="text" placeholder="name" required>
<input name = "email" type ="email" placeholder="email" required>
<input name = "password" type ="password" placeholder="password" required>
<input name = "age" type ="number" placeholder="age" required>
<div>
<label for="Male">
<input type="radio" id="male" name="gender" value="male"  />
Male
</label>

<label for="Female">
<input type="radio" id="female" name="gender" value="female"/>
Female
</label>
</div>
<button> Register</button>
</form>

<p>Already have an account? <a href="/">Login here</a></p>

</div>
</body>
</html>