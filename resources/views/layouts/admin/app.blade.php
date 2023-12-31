<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Our Articles @if(isset($title)) {{ ' | '.$title}} @endif</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400,500,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if(isset($scripts))
        {{ $scripts }}
        @endif
</head>

<body class="font-roboto antialiased bg-gray-100 text-gray-800 min-h-screen flex flex-col">
    <header class="bg-gradient-to-r from-teal-600 to-teal-800 text-white py-4 shadow-md">
        <div class="container mx-auto flex items-center justify-between">
            <h1 class="font-bold text-3xl sm:text-4xl p-4">@if(isset($header)) {{ $header }} @endif</h1>
            <nav class="space-x-4">
                <a href="{{ route('welcome') }}" class="py-2 px-4 hover:underline">Home</a>
                <a href="{{ route('admin') }}" class="py-2 px-4 hover:underline">Admin Home</a>

                <!-- Dropdown Button -->
                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <button @click="open = !open" class="group bg-transparent outline-none focus:outline-none py-2 px-4">
                        <span class="text-white hover:underline cursor-pointer">More Links</span>
                        <svg class="h-5 w-5 text-white group-hover:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 0 1 .707.293l5 5a1 1 0 0 1-1.414 1.414L10 5.414l-4.293 4.293a1 1 0 1 1-1.414-1.414l5-5a1 1 0 0 1 .707-.293z"/>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <div class="py-1">
                            @if(Auth::user()->isAdmin())
                            <a href="{{ route('admin-users')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">All users</a>
                            <a href="{{ route('admin-users-create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Create user</a>
                             @endif
                            <a href="{{ route('admin-categories')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">All Categories</a>
                            <a href="{{ route('admin-categories-create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Create Category</a>
                            <a href="{{ route('admin-posts')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">All Posts</a>
                            <a href="{{ route('admin-posts-create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Create Post</a>
                        </div>
                    </div>
                </div>

                <!-- End Dropdown Button -->

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a :href="route('logout')"
                            class="block px-4 py-2 text-gray-100 hover:underline rounded-md cursor-pointer"
                            onclick="event.preventDefault();this.closest('form').submit();">
                                    {{ __('Log Out') }}</a>
                </form>
            </nav>
        </div>
    </header>
    <div class="container mx-auto mt-8">
        <main class="p-6">
          {{$slot}}
        </main>
    </div>
    <!-- Footer -->
        <footer class="text-center bg-gray-400 text-white p-8 mt-8 ">
            <div class="container">
                <section class="mb-4">
                    <div class="logos flex justify-center p-3 gap-8">
                        <a href="#" class="transition duration-300 transform hover:scale-110"><img class="h-10 w-10" src='{{ asset("images/github.svg") }}' alt="github"></a>
                        <a href="#" class="transition duration-300 transform hover:scale-110"><img class="h-10 w-10" src='{{ asset("images/instagram.svg") }}' alt="instagram"></a>
                        <a href="#" class="transition duration-300 transform hover:scale-110"><img class="h-10 w-10" src='{{ asset("images/linkedin.svg") }}' alt="linkedin"></a>
                        <a href="#" class="transition duration-300 transform hover:scale-110"><img class="h-10 w-10" src='{{ asset("images/twitter.svg") }}' alt="twitter"></a>
                    </div>
                </section>
            </div>
            <div>
                <p class="text-center text-gray-900">&copy; {{ date('Y') }} Copyright: KetanPardhi</p>
            </div>
        </footer>
</body>

</html>
