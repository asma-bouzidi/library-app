@extends('layouts.app_modern')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#FCFAF7] via-[#F5F1E8] to-[#E8E3D8] flex flex-col items-center justify-center text-center px-4 py-12">

    <!-- Hero Image -->
    <div class="mb-8">
        <img src="https://via.placeholder.com/300x200/7C8C72/FCFAF7?text=Books" alt="Library Books" class="rounded-lg shadow-lg max-w-full h-auto">
    </div>

    <h1 class="text-4xl md:text-5xl font-serif font-bold mb-6 text-[#2B1F1A] animate-fade-in">
        Bienvenue sur Loxwood
    </h1>

    <p class="text-lg md:text-xl text-[#7C8C72] mb-8 max-w-2xl leading-relaxed">
        Connectez-vous pour accéder à votre bibliothèque personnelle.
    </p>

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md animate-fade-in" style="animation-delay: 0.2s;">

        <h2 class="text-2xl font-serif text-center mb-6 text-[#2B1F1A]">Connexion</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm text-center bg-red-50 p-3 rounded-lg">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium mb-2 text-[#2B1F1A]">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C6A15B] focus:border-transparent transition"
                >
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-2 text-[#2B1F1A]">Mot de passe</label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C6A15B] focus:border-transparent transition"
                >
            </div>

            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2 h-4 w-4 text-[#C6A15B] focus:ring-[#C6A15B] border-gray-300 rounded">
                    <label for="remember" class="text-sm text-[#2B1F1A]">
                        Se souvenir de moi
                    </label>
                </div>

                <a href="{{ route('password.request') }}" class="text-[#C6A15B] text-sm hover:underline transition">
                    Mot de passe oublié ?
                </a>
            </div>

            <button type="submit"
                class="w-full bg-[#2B1F1A] text-[#FCFAF7] py-3 rounded-2xl hover:bg-[#3D2B24] hover:scale-105 transition-all duration-300 flex items-center justify-center gap-2 shadow-lg">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                </svg>
                Se connecter
            </button>

            <p class="text-center text-sm mt-6 text-[#7C8C72]">
                Pas encore inscrit ?
                <a href="{{ route('register') }}" class="text-[#C6A15B] hover:underline transition">
                    Créer un compte
                </a>
            </p>

        </form>
    </div>

</div>

<style>
@keyframes fade-in {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fade-in 1s ease-out;
}
</style>
@endsection
