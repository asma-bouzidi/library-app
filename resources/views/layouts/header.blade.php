<header class="w-full bg-[#2B1F1A] text-[#FCFAF7] shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        {{-- Logo --}}
        <div class="text-2xl font-serif tracking-wide">
            📚 Library
        </div>

        {{-- Navigation --}}
        <nav class="flex items-center gap-6 text-sm uppercase tracking-wider">

            <a href="/" class="hover:text-[#C6A15B] transition">
                Accueil
            </a>

            @auth
                <a href="/dashboard" class="hover:text-[#C6A15B] transition">
                    Tableau de bord
                </a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-[#C6A15B] transition">
                        Déconnexion
                    </button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="hover:text-[#C6A15B] transition">
                    Connexion
                </a>
                <a href="{{ route('register') }}" class="hover:text-[#C6A15B] transition">
                    Inscription
                </a>
            @endguest

        </nav>

    </div>
</header>
