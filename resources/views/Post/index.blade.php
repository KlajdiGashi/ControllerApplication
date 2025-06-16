<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- Navbar -->

<x-post.nav></x-post.nav>
<!-- Post Cards -->
<div class="max-w-7xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach ($posts as $post)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition cursor-pointer" onclick="show({{ $post->id  }})">
            <img src="{{ asset('storage/' . $post->photo_path) }}"
                 alt="Post Image"
                 class="w-full h-48 object-cover">

            <div class="p-4 space-y-2">
                <h3 class="text-lg font-semibold text-gray-800">{{ $post->title }}</h3>
                <p class="text-gray-600 text-sm">{{ $post->description }}</p>
                <div class="text-xs text-gray-500 pt-2">
                    Posted by: <span class="font-medium">{{ $post->user->name }}</span>
                </div>
            </div>
        </div>
    @endforeach
        {{ $posts->links() }}

</div>

</body>
<script>
    function show(id){
        window.location.href=`/post/${id}`;
    }

</script>

</html>

