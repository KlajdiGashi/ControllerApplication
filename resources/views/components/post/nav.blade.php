@props(['is_createpost' => true])

<nav class="bg-white shadow mb-6">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <div class="text-xl font-bold text-blue-600"><a href="/">My Blog</a></div>
        <div class="flex inline-flex gap-4">

            @if($is_createpost)
                @auth()
                <div class="mt-2">
            <a href="{{ route('post.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                + Create Post
            </a>
                </div>
                @endauth
            @endif

            @auth()
                <div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                    <button type="submit"
                       class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                        Log Out
                    </button>
                    </form>
                </div>
            @endauth

                @guest()
                    <div class="mt-2">
                    <a href="{{ route('register') }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Register
                    </a>
                </div>
                    <div class="mt-2">
                        <a href="{{ route('login') }}"
                           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                            Log In
                        </a>
                    </div>

            @endguest

        </div>
    </div>
</nav>
