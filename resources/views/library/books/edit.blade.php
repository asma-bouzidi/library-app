@extends('layouts.app')

@section('title', 'Modifier un Livre - Library App')

@section('content')
<div class="flex justify-center items-start">
    <div class="w-full max-w-lg bg-[#F8F4EC] p-8 rounded-2xl shadow-sm">
        <h1 class="text-3xl md:text-4xl font-serif text-center mb-6 text-[#4B3621]">Modifier le Livre</h1>

        <form method="POST" action="{{ route('books.update', $book->id) }}">
            @csrf
            @method('PUT')

            <label for="title" class="block mb-2 font-serif text-[#2B1F1A]">Titre</label>
            <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" class="w-full px-4 py-2 border border-[#D6CBB5] rounded-xl mb-4 focus:outline-none" required>

            <label for="author" class="block mb-2 font-serif text-[#2B1F1A]">Auteur</label>
            <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" class="w-full px-4 py-2 border border-[#D6CBB5] rounded-xl mb-4 focus:outline-none" required>

            <label for="year" class="block mb-2 font-serif text-[#2B1F1A]">Année de publication</label>
            <input type="number" id="year" name="year" value="{{ old('year', $book->year) }}" class="w-full px-4 py-2 border border-[#D6CBB5] rounded-xl mb-4 focus:outline-none" required>

            <div class="text-center mt-6">
                <button type="submit" class="px-6 py-2 rounded-2xl bg-[#C6A15B] text-[#2B1F1A] font-serif hover:bg-[#b08d4f] transition-all w-full">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>
@endsection
