@extends('layouts.app')

@section('title', 'Modifier un Livre - Library App')

@section('content')
<div class="edit-book-body flex justify-center items-start">
    <div class="edit-book-form w-full max-w-lg bg-cream p-8 rounded-2xl shadow-md">
        <h1 class="home-title mb-6 text-3xl md:text-4xl font-serif text-center">Modifier le Livre</h1>

        <form method="POST" action="{{ url('/books/'.$book->id) }}">
            @csrf
            @method('PUT')

            <label for="title" class="block mb-2 font-serif text-espresso">Titre</label>
            <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" class="add-book-input mb-4" required>

            <label for="author" class="block mb-2 font-serif text-espresso">Auteur</label>
            <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" class="add-book-input mb-4" required>

            <label for="year" class="block mb-2 font-serif text-espresso">Année de publication</label>
            <input type="number" id="year" name="year" value="{{ old('year', $book->year) }}" class="add-book-input mb-4" required>

            <div class="text-center mt-6">
                <button type="submit" class="add-book-button w-full">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>
@endsection
