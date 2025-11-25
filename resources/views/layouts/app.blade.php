<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Library App')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-900 font-sans min-h-screen flex flex-col">
    <header class="bg-white shadow mb-6">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('books.index') }}" class="text-xl font-bold text-red-600 hover:text-red-700">Library App</a>
            <nav>
                <a href="{{ route('books.index') }}" class="text-gray-700 hover:text-red-600 font-semibold mr-4">Books</a>
                <a href="{{ route('books.create') }}" class="text-gray-700 hover:text-red-600 font-semibold">Add Book</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-4 flex-grow">
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-white shadow-inner mt-12 py-4 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} Library App. All rights reserved.
    </footer>
</body>
</html>
