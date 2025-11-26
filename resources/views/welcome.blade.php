<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Library App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#FCFAF7] text-[#2B1F1A]">

    <div class="min-h-screen flex flex-col items-center justify-center px-4">

        {{-- Logo / Titre --}}
        <h1 class="text-5xl font-serif font-bold tracking-wide mb-4">
            Library
        </h1>

        <p class="text-lg text-[#7C8C72] mb-10 text-center max-w-xl">
            Une collection élégante de livres et de savoir, dans une ambiance raffinée.
        </p>

        {{-- Boutons --}}
        <div class="flex gap-4">
            <a href="{{ route('login') }}"
               class="px-8 py-3 rounded-2xl bg-[#2B1F1A] text-[#FCFAF7] hover:opacity-90 transition">
                Se connecter
            </a>

            <a href="{{ route('register') }}"
               class="px-8 py-3 rounded-2xl border border-[#2B1F1A] text-[#2B1F1A] hover:bg-[#2B1F1A] hover:text-[#FCFAF7] transition rounded-2xl">
                Créer un compte
            </a>
        </div>

    </div>

</body>
</html>
