<aside class="w-64 bg-[#2B1F1A] text-[#FCFAF7] min-h-screen p-6 fixed left-0 top-0 shadow-sm border-r border-gray-200">

    <h1 class="text-3xl font-bold text-[#FCFAF7] mb-4 tracking-wide whitespace-nowrap overflow-hidden text-ellipsis">
        🏛️ Loxwood
    </h1>

    <hr class="border-t border-[#FCFAF7] my-4">

    <nav class="flex flex-col gap-4 text-sm uppercase tracking-wide">

        <a href="/" class="hover:text-[#C6A15B] hover:scale-105 transition-all duration-300 ease-in-out px-4 py-2 rounded-lg hover:bg-[#C6A15B]/10 hover:shadow-md">
            Home
        </a>

        <a href="/dashboard" class="hover:text-[#C6A15B] hover:scale-105 transition-all duration-300 ease-in-out px-4 py-2 rounded-lg hover:bg-[#C6A15B]/10 hover:shadow-md">
            Dashboard
        </a>

        <a href="/books" class="hover:text-[#C6A15B] hover:scale-105 transition-all duration-300 ease-in-out px-4 py-2 rounded-lg hover:bg-[#C6A15B]/10 hover:shadow-md">
            Books
        </a>

        <a href="/authors" class="hover:text-[#C6A15B] hover:scale-105 transition-all duration-300 ease-in-out px-4 py-2 rounded-lg hover:bg-[#C6A15B]/10 hover:shadow-md">
            Authors
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="mt-32 text-left hover:text-red-500 hover:scale-105 transition-all duration-300 ease-in-out px-4 py-2 rounded-lg hover:bg-red-50 hover:shadow-md">
                Logout
            </button>
        </form>

    </nav>

</aside>
