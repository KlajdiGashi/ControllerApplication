<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
     
</head>
<body>
    @if(request('success'))
    <div style="color: green; font-weight: bold;">
        {{ request('success') }}
    </div>
@endif
    <h3>Login successful! Welcome!</h3>

    
    <form action="/logout" method="POST">
        @csrf
        <button type="submit" >Logout</button>
    </form>
    
</body>
</html>
<style>

        button {
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }
        </style>