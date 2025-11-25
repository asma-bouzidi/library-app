@extends('layouts.app')

@section('title', 'Tableau de Bord - Library App')

@section('content')
<div class="dashboard-body text-center mb-12">
    <h1 class="home-title mb-4 text-4xl md:text-5xl font-serif">Tableau de Bord</h1>
    <p class="home-subtitle text-lg md:text-xl text-sage">Gérez vos livres, emprunts et utilisateurs avec élégance</p>
</div>

<div class="grid md:grid-cols-3 gap-8">
    <!-- Livres -->
    <div class="dashboard-card">
        <h3 class="text-2xl font-serif mb-2">Livres</h3>
        <p class="text-sage">{{ $booksCount ?? 0 }} livres disponibles</p>
    </div>

    <!-- Emprunts -->
    <div class="dashboard-card">
        <h3 class="text-2xl font-serif mb-2">Emprunts</h3>
        <p class="text-sage">{{ $loansCount ?? 0 }} emprunts actifs</p>
    </div>

    <!-- Utilisateurs -->
    <div class="dashboard-card">
        <h3 class="text-2xl font-serif mb-2">Utilisateurs</h3>
        <p class="text-sage">{{ $usersCount ?? 0 }} utilisateurs enregistrés</p>
    </div>
</div>
@endsection
