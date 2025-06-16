<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md text-gray-800">

        @if(auth()->check())
            <h2 class="text-2xl font-semibold mb-4 text-green-600">You are logged in!</h2>
            <div class="space-y-2">
                <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p><strong>Age:</strong> {{ auth()->user()->age }}</p>
                <p><strong>Gender:</strong> {{ auth()->user()->gender }}</p>
            </div>

            <form action="/logout" method="POST" class="mt-6">
                @csrf
                <button type="submit" class="w-full bg-red-600 text-white py-2 rounded-md hover:bg-red-700 transition">
                    Logout
                </button>
            </form>
        @else
            <h2 class="text-2xl font-semibold mb-2 text-blue-600">Welcome!</h2>
            <p class="mb-4 text-gray-600">Please log in or register to continue.</p>

            <div class="space-y-3">
                <form action="/login-page" method="GET">
                    @csrf
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                        Login
                    </button>
                </form>

                <form action="/register-page" method="GET">
                    @csrf
                    <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 transition">
                        Register
                    </button>
                </form>
            </div>
        @endif

    </div>

</body>
</html>
