@extends('layouts.app')

@section('title', 'Accueil - Library App')

@section('content')
<div class="text-center mb-12">
    <h1 class="text-4xl md:text-5xl font-serif mb-4 text-[#4B3621]">Bienvenue dans votre bibliothèque</h1>
    <p class="text-lg md:text-xl text-[#7C8C72]">Une collection raffinée de livres classiques et modernes</p>
</div>

<div class="grid md:grid-cols-3 gap-8">
    @foreach($featuredBooks as $book)
        <div class="bg-[#FAFAF7] border border-[#E5DCC8] rounded-2xl p-6 shadow-sm">
            <h3 class="text-2xl font-serif mb-2 text-[#4B3621]">{{ $book->title }}</h3>
            <p class="text-[#7C8C72] mb-4">{{ $book->author }}</p>
            <div class="flex justify-between items-center text-sm">
                <span class="italic text-[#7C8C72]">{{ $book->year }}</span>
                <a href="{{ url('/books/'.$book->id) }}" class="text-[#C6A15B] hover:underline">Voir →</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
