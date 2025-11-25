@extends('layouts.app')

@section('title', 'Liste des Livres - Library App')

@section('content')
<div class="text-center mb-12">
    <h1 class="text-4xl md:text-5xl font-serif mb-4 text-[#4B3621]">Collection de Livres</h1>
    <p class="text-lg md:text-xl text-[#7C8C72]">Découvrez tous vos ouvrages préférés</p>
</div>

<div class="flex justify-end mb-6">
    <a href="{{ route('books.create') }}" class="px-6 py-2 rounded-2xl bg-[#C6A15B] text-[#2B1F1A] font-serif hover:bg-[#b08d4f] transition-all">Ajouter un Livre</a>
</div>

<div class="grid md:grid-cols-3 gap-8">
    @foreach($books as $book)
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
