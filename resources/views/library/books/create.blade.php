@extends('layouts.app')

@section('title', 'Ajouter un Livre - Library App')

@section('content')
<div class="add-book-body flex justify-center items-start">
    <div class="add-book-form w-full max-w-lg bg-cream p-8 rounded-2xl shadow-md">
        <h1 class="home-title mb-6 text-3xl md:text-4xl font-serif text-center">Ajouter un Livre</h1>

        <form method="POST" action="{{ url('/books') }}">
            @csrf

            <label for="title" class="block mb-2 font-serif text-espresso">Titre</label>
            <input type="text" id="title" name="title" placeholder="Titre du livre" class="add-book-input mb-4" required>

            <label for="author" class="block mb-2 font-serif text-espresso">Auteur</label>
            <input type="text" id="author" name="author" placeholder="Nom de l'auteur" class="add-book-input mb-4" required>

            <label for="year" class="block mb-2 font-serif text-espresso">Année de publication</label>
            <input type="number" id="year" name="year" placeholder="2025" class="add-book-input mb-4" required>

            <div class="text-center mt-6">
                <button type="submit" class="add-book-button">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
@endsection
