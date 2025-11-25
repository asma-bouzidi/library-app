@extends('layouts.app')

@section('title', 'Accueil - Library App')

@section('content')
<div class="home-body text-center mb-12">
    <h1 class="home-title mb-4 text-4xl md:text-5xl font-serif">Bienvenue dans votre bibliothèque</h1>
    <p class="home-subtitle text-lg md:text-xl text-sage">Une collection raffinée de livres classiques et modernes</p>
</div>

<div class="grid md:grid-cols-3 gap-8">
    @foreach($featuredBooks as $book)
        <div class="book-card">
            <h3 class="book-title mb-2 text-2xl font-serif">{{ $book->title }}</h3>
            <p class="book-author mb-4 text-sage">{{ $book->author }}</p>
            <div class="flex justify-between items-center text-sm">
                <span class="italic text-sage">{{ $book->year }}</span>
                <a href="{{ url('/books/'.$book->id) }}" class="book-link">Voir →</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
