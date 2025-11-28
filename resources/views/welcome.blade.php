@extends('layouts.app_modern')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#FCFAF7] via-[#F5F1E8] to-[#E8E3D8] flex flex-col items-center justify-center text-center px-4 py-12">

    <!-- Hero Image -->
    <div class="mb-8">
        <img src="https://via.placeholder.com/300x200/7C8C72/FCFAF7?text=Books" alt="Library Books" class="rounded-lg shadow-lg max-w-full h-auto">
    </div>

    <h1 class="text-6xl md:text-7xl font-serif font-bold mb-6 text-[#2B1F1A] animate-fade-in">
        Loxwood
    </h1>

    <p class="text-xl md:text-2xl text-[#7C8C72] mb-12 max-w-2xl leading-relaxed">
        Une bibliothèque élégante pour gérer vos livres avec style. Découvrez une expérience unique de gestion littéraire.
    </p>

    <div class="flex flex-col sm:flex-row gap-6">
        <a href="{{ route('login') }}"
           class="px-10 py-4 rounded-2xl bg-[#2B1F1A] text-[#FCFAF7] hover:bg-[#3D2B24] hover:scale-105 transition-all duration-300 flex items-center justify-center gap-2 shadow-lg">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
            </svg>
            Se connecter
        </a>

        <a href="{{ route('register') }}"
           class="px-10 py-4 rounded-2xl border-2 border-[#2B1F1A] text-[#2B1F1A] hover:bg-[#2B1F1A] hover:text-[#FCFAF7] hover:scale-105 transition-all duration-300 flex items-center justify-center gap-2 shadow-lg">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
            </svg>
            Créer un compte
        </a>
    </div>

    <!-- Additional Features Section -->
    <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl">
        <div class="bg-white bg-opacity-70 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
            <div class="text-4xl mb-4">📚</div>
            <h3 class="text-lg font-semibold mb-2">Gestion des Livres</h3>
            <p class="text-sm text-gray-600">Organisez votre collection de livres facilement.</p>
        </div>
        <div class="bg-white bg-opacity-70 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
            <div class="text-4xl mb-4">👥</div>
            <h3 class="text-lg font-semibold mb-2">Réservations</h3>
            <p class="text-sm text-gray-600">Réservez vos livres préférés en ligne.</p>
        </div>
        <div class="bg-white bg-opacity-70 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
            <div class="text-4xl mb-4">📖</div>
            <h3 class="text-lg font-semibold mb-2">Emprunts</h3>
            <p class="text-sm text-gray-600">Suivez vos emprunts et retours.</p>
        </div>
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
