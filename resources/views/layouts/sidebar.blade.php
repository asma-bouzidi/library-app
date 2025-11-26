<aside class="w-64 bg-[#2B1F1A] text-[#FCFAF7] min-h-screen p-6 fixed left-0 top-0">

    <h2 class="text-2xl font-serif mb-10 tracking-wide">
        📚 Library
    </h2>

    <nav class="flex flex-col gap-4 text-sm uppercase tracking-wider">

        <a href="/dashboard" class="hover:text-[#C6A15B] transition">
            Dashboard
        </a>

        <a href="/books" class="hover:text-[#C6A15B] transition">
            Livres
        </a>

        <a href="/authors" class="hover:text-[#C6A15B] transition">
            Auteurs
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="mt-10 text-left hover:text-red-400 transition">
                Déconnexion
            </button>
        </form>

    </nav>

</aside>
