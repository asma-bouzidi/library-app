@extends('layouts.app_modern')

@section('content')
<div class="bg-gradient-to-br from-[#FCFAF7] via-[#F5F1E8] to-[#E8E3D8] min-h-screen p-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-4xl font-serif text-center mb-8 text-[#2B1F1A] animate-fade-in">Ajouter un Livre</h1>

        <div class="bg-white p-8 rounded-2xl shadow-lg animate-fade-in" style="animation-delay: 0.2s;">
            @if ($errors->any())
                <div class="mb-6 text-red-600 text-sm text-center bg-red-50 p-3 rounded-lg">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('books.store') }}">
                @csrf

                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium mb-2 text-[#2B1F1A]">Titre</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Titre du livre"
                        class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C6A15B] focus:border-transparent transition" required>
                </div>

                <div class="mb-6">
                    <label for="author" class="block text-sm font-medium mb-2 text-[#2B1F1A]">Auteur</label>
                    <input type="text" id="author" name="author" value="{{ old('author') }}" placeholder="Nom de l'auteur"
                        class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C6A15B] focus:border-transparent transition" required>
                </div>

                <div class="mb-6">
                    <label for="year" class="block text-sm font-medium mb-2 text-[#2B1F1A]">Année de publication</label>
                    <input type="number" id="year" name="year" value="{{ old('year') }}" placeholder="2025"
                        class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C6A15B] focus:border-transparent transition" required>
                </div>

                <div class="mb-6">
                    <label for="category" class="block text-sm font-medium mb-2 text-[#2B1F1A]">Catégorie</label>
                    <input type="text" id="category" name="category" value="{{ old('category') }}" placeholder="Fiction"
                        class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C6A15B] focus:border-transparent transition" required>
                </div>

                <div class="mb-8">
                    <label for="available_copies" class="block text-sm font-medium mb-2 text-[#2B1F1A]">Copies disponibles</label>
                    <input type="number" id="available_copies" name="available_copies" value="{{ old('available_copies') }}" placeholder="10"
                        class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C6A15B] focus:border-transparent transition" required>
                </div>

                <button type="submit"
                    class="w-full bg-[#2B1F1A] text-[#FCFAF7] py-3 rounded-2xl hover:bg-[#3D2B24] hover:scale-105 transition-all duration-300 flex items-center justify-center gap-2 shadow-lg">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Enregistrer
                </button>
            </form>
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
