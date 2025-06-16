<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm rounded">
        
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Create a Blog</h2>
                
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('created'))
                     <div class="alert alert-success">
                      {{ session('created') }}
                     </div>
                @endif


                <form action="{{ url('storeBlog') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required maxlength="20">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4" required minlength="4" maxlength="255">{{ old('description') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Create Blog</button>
                </form>
                     @if ($blogs->count())
                     <h4 class="mt-4">My blogs:</h4>
                     @foreach ($blogs as $blog)
                            <div class="p-3 mb-3 bg-white border rounded shadow-sm">
                            <h5 class="text-primary">{{ $blog->title }}</h5>
                            <p>{{ $blog->description }}</p>
                            <small class="text-muted">Krijuar më: {{ $blog->created_at->format('d M Y, H:i') }}</small>
                            </div>
                     @endforeach
                     @else
                     <p class="text-muted mt-3">U have not created any blog</p>
                     @endif
                     <form method="POST" action="/logout" class="mt-4 text-end">
                     @csrf
                     <button type="submit" class="btn btn-danger">Logout</button>
                     </form>





            </div>
        </div>
    </div>
</body>
</html>
