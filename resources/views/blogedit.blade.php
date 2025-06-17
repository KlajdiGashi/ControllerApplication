<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800">Edit Blog</h2>

        <form action="/update/{{ $blog->id }}" method="POST" enctype="multipart/form-data" class="space-y-4">

            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input name="title" type="text" placeholder="Blog Title"
                    class="mt-1 w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    value="{{ old('title', $blog->title) }}" />
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="4" placeholder="Blog Description"
                    class="mt-1 w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('description', $blog->description) }}</textarea>
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input name="image" type="file"
                    class="mt-1 w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" />

                @if ($blog->image)
                    <p class="text-sm text-gray-600 mt-2">Current image:</p>
                    <img src="{{ asset('storage/' . $blog->image) }}" class="mt-1 rounded w-full h-48 object-cover" />
                @endif
            </div>


            <button type="submit"
                class="w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-600 transition duration-200">
                Update Blog
            </button>
        </form>

        @if ($errors->any())
            <div class="mt-4 bg-red-100 text-red-700 p-3 rounded-md text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

</body>

</html>