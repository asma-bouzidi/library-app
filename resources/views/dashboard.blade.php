@extends('layouts.app')

@section('title', 'Tableau de Bord - Library App')

@section('content')
<div class="text-center mb-12">
    <h1 class="text-4xl md:text-5xl font-serif mb-4 text-[#4B3621]">Tableau de Bord</h1>
    <p class="text-lg md:text-xl text-[#7C8C72]">Gérez vos livres, emprunts et utilisateurs avec élégance</p>
</div>

<div class="grid md:grid-cols-3 gap-8">
    <!-- Livres -->
    <div class="bg-[#FAFAF7] border border-[#E5DCC8] rounded-2xl p-6 shadow-sm">
        <h3 class="text-2xl font-serif mb-2 text-[#4B3621]">Livres</h3>
        <p class="text-[#7C8C72]">{{ $booksCount ?? 0 }} livres disponibles</p>
    </div>

    <!-- Emprunts -->
    <div class="bg-[#FAFAF7] border border-[#E5DCC8] rounded-2xl p-6 shadow-sm">
        <h3 class="text-2xl font-serif mb-2 text-[#4B3621]">Emprunts</h3>
        <p class="text-[#7C8C72]">{{ $loansCount ?? 0 }} emprunts actifs</p>
    </div>

    <!-- Utilisateurs -->
    <div class="bg-[#FAFAF7] border border-[#E5DCC8] rounded-2xl p-6 shadow-sm">
        <h3 class="text-2xl font-serif mb-2 text-[#4B3621]">Utilisateurs</h3>
        <p class="text-[#7C8C72]">{{ $usersCount ?? 0 }} utilisateurs enregistrés</p>
    </div>
</div>
@endsection
