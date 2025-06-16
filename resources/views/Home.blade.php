<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <div class="container">
        <h1>Welcome to Your Profile</h1>
        <p>Login Successful!</p>
        <div class="profile-details">
            <h2>User Information</h2>
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        </div>
     
            @csrf
        </form>
    </div>
</body>
</html>