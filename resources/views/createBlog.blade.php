<!-- resources/views/create_blog.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Create Blog</title>
</head>
<body>

    <h1>Create a New Blog</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blog.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">Title:</label><br>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
        </div><br>

        <div>
            <label for="description">Description:</label><br>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
        </div><br>

        <button type="submit">Create Blog</button>
    </form>

</body>
</html>
