<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-2xl text-gray-800">

        @if(auth()->check())
            <h2 class="text-3xl font-bold mb-6 text-green-700 flex items-center justify-between">
                All Blogs
                <a href="/blog-create"
                    class="ml-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                    Create Blog
                </a>
            </h2>

            @if($blogs->isEmpty())
                <p class="text-gray-500">No blogs found.</p>
            @else
                <div class="space-y-4">
                    @foreach($blogs as $blog)
                        <div class="p-4 border rounded-md hover:shadow-md transition bg-gray-50">
                            <h3 class="text-xl font-semibold text-blue-700">{{ $blog->title }}</h3>
                            <p class="text-gray-700 mt-1">{{ $blog->description }}</p>

                           @if ($blog->image)
    <div class="inline-block rounded-lg overflow-hidden border border-gray-300 mt-2">
        <img 
            src="{{ asset('storage/' . $blog->image) }}"
            alt="Blog image"
            class="object-cover max-w-full h-auto"
        />
    </div>
@endif



                            <div class="text-sm text-gray-500 mt-2 flex justify-between items-center">
                                <span>
                                    Posted by: <strong>{{ $blog->user->name }}</strong>
                                </span>
                                @if(auth()->id() === $blog->user_id)
                                    <div class="flex space-x-2">
                                        <a href="/edit/{{ $blog->id }}"
                                            class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 transition">
                                            Edit
                                        </a>

                                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif

                            </div>
                        </div>
                    @endforeach




                </div>
            @endif

            <form action="/logout" method="POST" class="mt-8">
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
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                        Login
                    </button>
                </form>
                <form action="/register-page" method="GET">
                    @csrf
                    <button type="submit"
                        class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 transition">
                        Register
                    </button>
                </form>
            </div>
        @endif
    </div>

</body>

</html>