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
    <header class="bg-[#2B1F1A] text-[#F8F4EC] py-8 px-12 flex justify-between items-center shadow-lg border-b border-[#C6A15B]/20">
        <a href="/" class="text-3xl font-serif tracking-wide hover:scale-105 transition-transform duration-300">Bibliothèque Raffinée</a>
        <nav class="space-x-8 text-lg">
            <a href="/books" class="hover:text-[#C6A15B] transition-all duration-300 hover:scale-105">Livres</a>
            <a href="/dashboard" class="hover:text-[#C6A15B] transition-all duration-300 hover:scale-105">Dashboard</a>
            @guest
                <a href="/login" class="hover:text-[#C6A15B] transition-all duration-300 hover:scale-105">Connexion</a>
                <a href="/register" class="hover:text-[#C6A15B] transition-all duration-300 hover:scale-105">Inscription</a>
            @else
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-[#C6A15B] transition-all duration-300 hover:scale-105">Déconnexion</button>
                </form>
            @endguest
        </nav>
    </header>

    <!-- Main content -->
    <main class="flex-grow container mx-auto px-8 py-12 max-w-7xl">
        @if(session('status'))
            <div class="bg-[#7C8C72]/10 border border-[#7C8C72] text-[#4B3621] px-6 py-4 rounded-lg mb-8 shadow-sm">
                {{ session('status') }}
            </div>
        @endif
        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-lg mb-8 shadow-sm">
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
    <footer class="bg-[#2B1F1A] text-[#F8F4EC] text-center py-12 text-sm tracking-wider border-t border-[#C6A15B]/20">
        <div class="max-w-4xl mx-auto px-8">
            <p class="text-lg font-serif mb-4">Bibliothèque Raffinée</p>
            <p>&copy; {{ date('Y') }} Tous droits réservés. Une collection élégante de littérature classique et moderne.</p>
        </div>
    </footer>

</body>
</html>
