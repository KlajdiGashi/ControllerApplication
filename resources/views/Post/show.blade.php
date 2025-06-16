<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen ">

<x-post.nav class="post">

</x-post.nav>

<!-- Single Post Card -->
<div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
    <img src="{{ asset('storage/' . $post->photo_path) }}"
         alt="{{ $post->title }}"
         class="w-full h-72 object-cover">

    <div class="p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>
        <p class="text-gray-700 text-base leading-relaxed">{{ $post->description }}</p>

        <div class="mt-6 text-sm text-gray-500">
            Posted by <span class="font-medium text-gray-800">{{ $post->user->name }}</span>
        </div>
        @auth()

            @if(auth()->id() === $post->user->id)
                <div class="flex inline-flex gap-6">
        <div class="mt-6">
            <a href="/post/{{ $post->id }}/edit"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Edit
            </a>
        </div>
                <div class="mt-3.5">
                    <form action="/post/{{ $post->id }}/" method="POST">
                        @csrf
                        @method("delete")
                        <button type="submit"
                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                         Delete
                        </button>
                    </form>
        </div>
                </div>
            @endif

        @endauth
    </div>

</div>

</body>
</html>
