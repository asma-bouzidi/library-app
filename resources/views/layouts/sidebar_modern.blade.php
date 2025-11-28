<aside class="w-64 bg-white text-[#2B1F1A] min-h-screen p-6 fixed left-0 top-0 shadow-sm border-r border-gray-200">

    <h1 class="text-4xl font-bold text-[#C6A15B] mb-4 tracking-wide">
        🏛️ Blackwood Archives
    </h1>

    <nav class="flex flex-col gap-4 text-sm uppercase tracking-wide">

        <a href="/" class="hover:text-[#C6A15B] hover:scale-105 transition-all duration-300 ease-in-out px-4 py-2 rounded-lg hover:bg-[#C6A15B]/10 hover:shadow-md">
            Accueil
        </a>

        <a href="/dashboard" class="hover:text-[#C6A15B] hover:scale-105 transition-all duration-300 ease-in-out px-4 py-2 rounded-lg hover:bg-[#C6A15B]/10 hover:shadow-md">
            Dashboard
        </a>

        <a href="/books" class="hover:text-[#C6A15B] hover:scale-105 transition-all duration-300 ease-in-out px-4 py-2 rounded-lg hover:bg-[#C6A15B]/10 hover:shadow-md">
            Livres
        </a>

        <a href="/authors" class="hover:text-[#C6A15B] hover:scale-105 transition-all duration-300 ease-in-out px-4 py-2 rounded-lg hover:bg-[#C6A15B]/10 hover:shadow-md">
            Auteurs
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="mt-10 text-left hover:text-red-500 hover:scale-105 transition-all duration-300 ease-in-out px-4 py-2 rounded-lg hover:bg-red-50 hover:shadow-md">
                Déconnexion
            </button>
        </form>

    </nav>

</aside>
