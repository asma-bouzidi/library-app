<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Loxwood</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FCFAF7] text-[#2B1F1A] min-h-screen">

    @auth
        @include('layouts.sidebar')

        <div class="ml-64">
            @endif

            {{-- Header --}}
            <header class="w-full bg-[#2B1F1A] text-[#FCFAF7] shadow-md">
                <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

                    <div class="text-2xl font-serif tracking-wide">
                        📚 Blackwood Archives
                    </div>

                    <nav class="flex items-center gap-6 text-sm uppercase tracking-wider">

                        <a href="/" class="hover:text-[#C6A15B] transition">
                            Accueil
                        </a>

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

            <main class="py-12 px-6">
                @yield('content')
            </main>

        @auth
        </div>
    @endauth
@include('layouts.footer')
</body>

</html>

