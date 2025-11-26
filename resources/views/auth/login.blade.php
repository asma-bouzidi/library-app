<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FCFAF7] flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
    <h2 class="text-3xl font-serif text-center text-[#2B1F1A] mb-6">
        Connexion
    </h2>

    {{-- Message d'erreur général --}}
    @if ($errors->any())
        <div class="mb-4 text-red-600 text-sm text-center">
            {{ $errors->first() }}
        </div>
    @endif

    {{-- Message de statut --}}
    @if (session('status'))
        <div class="mb-4 text-green-600 text-sm text-center">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-sm text-[#2B1F1A] mb-1">Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C6A15B]"
            >
        </div>

        <div class="mb-4">
            <label class="block text-sm text-[#2B1F1A] mb-1">Mot de passe</label>
            <input
                type="password"
                name="password"
                required
                class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C6A15B]"
            >
        </div>

        <div class="flex items-center justify-between mb-4">
            <div>
                <input type="checkbox" name="remember" id="remember" class="mr-1">
                <label for="remember" class="text-sm text-[#2B1F1A]">
                    Se souvenir de moi
                </label>
            </div>

            {{-- Lien Mot de passe oublié --}}
            <a href="{{ route('password.request') }}" class="text-[#C6A15B] text-sm hover:underline">
                Mot de passe oublié ?
            </a>
        </div>

        <div class="text-center mt-6">
            <button type="submit"
                class="px-6 py-2 rounded-2xl bg-[#C6A15B] text-[#2B1F1A] font-serif hover:bg-[#b08d4f] transition-all w-full">
                Se connecter
            </button>
        </div>
    </form>

    <p class="text-center text-[#7C8C72] mt-4 text-sm">
        Pas encore inscrit ?
        <a href="{{ route('register') }}" class="text-[#C6A15B] hover:underline">
            Créer un compte
        </a>
    </p>
</div>

</body>
</html>
