<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library App')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#F8F4EC] text-[#2B1F1A] font-sans min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-[#2B1F1A] text-[#F8F4EC] py-6 px-10 flex justify-between items-center">
        <a href="/" class="text-2xl font-serif">Library</a>
        <nav class="space-x-4">
            <a href="/books" class="hover:text-[#C6A15B] transition-colors">Livres</a>
            <a href="/dashboard" class="hover:text-[#C6A15B] transition-colors">Dashboard</a>
            @guest
                <a href="/login" class="hover:text-[#C6A15B] transition-colors">Connexion</a>
                <a href="/register" class="hover:text-[#C6A15B] transition-colors">Inscription</a>
            @else
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-[#C6A15B] transition-colors">Déconnexion</button>
                </form>
            @endguest
        </nav>
    </header>

    <!-- Main content -->
    <main class="flex-grow container mx-auto px-4 py-8">
        @if(session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#2B1F1A] text-[#F8F4EC] text-center py-8 text-sm tracking-wider">
        &copy; {{ date('Y') }} Library App. Tous droits réservés.
    </footer>

</body>
</html>
