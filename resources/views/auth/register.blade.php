@extends('layouts.app_modern')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#FCFAF7] via-[#F5F1E8] to-[#E8E3D8] flex flex-col items-center justify-center text-center px-4 py-12">

    <!-- Hero Image -->
    <div class="mb-8">
        <img src="https://via.placeholder.com/300x200/7C8C72/FCFAF7?text=Books" alt="Library Books" class="rounded-lg shadow-lg max-w-full h-auto">
    </div>

    <h1 class="text-4xl md:text-5xl font-serif font-bold mb-6 text-[#2B1F1A] animate-fade-in">
        Rejoignez Loxwood
    </h1>

    <p class="text-lg md:text-xl text-[#7C8C72] mb-8 max-w-2xl leading-relaxed">
        Créez votre compte pour accéder à une bibliothèque moderne et élégante.
    </p>

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md animate-fade-in" style="animation-delay: 0.2s;">

        <h2 class="text-2xl font-serif text-center mb-6 text-[#2B1F1A]">Créer un compte</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm text-center bg-red-50 p-3 rounded-lg">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium mb-2 text-[#2B1F1A]">Nom complet</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Votre nom complet"
                    class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C6A15B] focus:border-transparent transition" required autofocus>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium mb-2 text-[#2B1F1A]">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Votre email"
                    class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C6A15B] focus:border-transparent transition" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium mb-2 text-[#2B1F1A]">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Votre mot de passe"
                    class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C6A15B] focus:border-transparent transition" required>
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium mb-2 text-[#2B1F1A]">Confirmez le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmez votre mot de passe"
                    class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C6A15B] focus:border-transparent transition" required>
            </div>

            <button type="submit"
                class="w-full bg-[#2B1F1A] text-[#FCFAF7] py-3 rounded-2xl hover:bg-[#3D2B24] hover:scale-105 transition-all duration-300 flex items-center justify-center gap-2 shadow-lg">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                </svg>
                S'inscrire
            </button>

            <p class="text-center text-sm mt-6 text-[#7C8C72]">
                Déjà inscrit ? <a href="{{ route('login') }}" class="text-[#C6A15B] hover:underline transition">Se connecter</a>
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
