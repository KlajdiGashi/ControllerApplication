<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10 px-4">



<!-- Edit Post Form -->
<div class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Edit Post</h2>

    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input name="title" id="title" type="text"
                   value="{{ old('title', $post->title) }}"
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-blue-500 focus:border-blue-500">
            @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4"
                      class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-blue-500 focus:border-blue-500">{{ old('description', $post->description) }}</textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Current Photo Preview -->
        <div>
            <p class="text-sm font-medium text-gray-700 mb-1">Current Photo:</p>
            <img src="{{ asset('storage/' . $post->photo_path) }}" alt="Post Photo"
                 class="w-full h-48 object-cover rounded-lg mb-2">
        </div>

        <!-- New Photo Upload -->
        <div>
            <label for="photo" class="block text-sm font-medium text-gray-700">Change Photo (optional)</label>
            <input type="file" name="photo" id="photo"
                   class="mt-1 block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            @error('photo')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <div class="text-center">
            <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition">
                Update Post
            </button>
        </div>
    </form>
</div>

</body>
</html>
