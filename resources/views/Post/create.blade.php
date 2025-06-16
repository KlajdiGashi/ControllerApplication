<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="bg-gray-100 ">
<x-post.nav :is_createpost="false">

</x-post.nav>
<div class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Create New Post</h2>

    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Title -->
        <div>
            <input name="title" type="text"
                   placeholder="Title"
                   value="{{ old('title') }}"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none"
            >
            @error('title')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div>
                <textarea name="description"
                          placeholder="Description"
                          rows="4"
                          class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                >{{ old('description') }}</textarea>
            @error('description')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Photo Upload -->
        <div>
            <input type="file" name="photo"
                   class="block w-full text-sm text-gray-600
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-xl file:border-0
                              file:text-sm file:font-semibold
                              file:bg-blue-50 file:text-blue-700
                              hover:file:bg-blue-100" />
            @error('photo')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <div>
            <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                Create Post
            </button>
        </div>
    </form>
</div>

</body>
</html>
