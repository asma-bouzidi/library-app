<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library App')</title>
    @vite('resources/css/pages.css')
</head>
<body class="bg-cream text-espresso font-sans min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-espresso text-cream py-6 px-10 flex justify-between items-center">
        <a href="/" class="text-2xl font-serif">Library</a>
        <nav class="space-x-4">
            <a href="/books" class="hover:text-gold transition-colors">Livres</a>
            <a href="/dashboard" class="hover:text-gold transition-colors">Dashboard</a>
            @guest
                <a href="/login" class="hover:text-gold transition-colors">Connexion</a>
                <a href="/register" class="hover:text-gold transition-colors">Inscription</a>
            @else
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-gold transition-colors">Déconnexion</button>
                </form>
            @endguest
        </nav>
    </header>

    <!-- Main content -->
    <main class="flex-grow container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-espresso text-cream text-center py-8 text-sm tracking-wider">
        &copy; {{ date('Y') }} Library App. Tous droits réservés.
    </footer>

</body>
</html>
