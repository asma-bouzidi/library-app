@extends('layouts.app_modern')

@section('content')
<div class="bg-gradient-to-br from-[#FCFAF7] via-[#F5F1E8] to-[#E8E3D8] min-h-screen p-8">
    <h1 class="text-4xl font-serif mb-10 text-[#2B1F1A] animate-fade-in">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 animate-fade-in" style="animation-delay: 0.1s;">
            <div class="flex items-center mb-4">
                <div class="text-3xl mr-3">📚</div>
                <h3 class="text-lg text-[#7C8C72]">Livres</h3>
            </div>
            <p class="text-3xl font-bold mt-2 text-[#2B1F1A]">120</p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 animate-fade-in" style="animation-delay: 0.2s;">
            <div class="flex items-center mb-4">
                <div class="text-3xl mr-3">✍️</div>
                <h3 class="text-lg text-[#7C8C72]">Auteurs</h3>
            </div>
            <p class="text-3xl font-bold mt-2 text-[#2B1F1A]">45</p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 animate-fade-in" style="animation-delay: 0.3s;">
            <div class="flex items-center mb-4">
                <div class="text-3xl mr-3">👥</div>
                <h3 class="text-lg text-[#7C8C72]">Utilisateurs</h3>
            </div>
            <p class="text-3xl font-bold mt-2 text-[#2B1F1A]">10</p>
        </div>

    </div>

    <!-- Additional Dashboard Sections -->
    <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white p-6 rounded-2xl shadow-lg animate-fade-in" style="animation-delay: 0.4s;">
            <h3 class="text-xl font-serif mb-4 text-[#2B1F1A]">Activités Récentes</h3>
            <ul class="space-y-3">
                <li class="flex items-center text-sm text-[#7C8C72]">
                    <div class="w-2 h-2 bg-[#C6A15B] rounded-full mr-3"></div>
                    Nouveau livre ajouté : "Le Petit Prince"
                </li>
                <li class="flex items-center text-sm text-[#7C8C72]">
                    <div class="w-2 h-2 bg-[#C6A15B] rounded-full mr-3"></div>
                    Emprunt retourné par Jean Dupont
                </li>
                <li class="flex items-center text-sm text-[#7C8C72]">
                    <div class="w-2 h-2 bg-[#C6A15B] rounded-full mr-3"></div>
                    Nouvelle réservation pour "1984"
                </li>
            </ul>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-lg animate-fade-in" style="animation-delay: 0.5s;">
            <h3 class="text-xl font-serif mb-4 text-[#2B1F1A]">Statistiques du Mois</h3>
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-[#7C8C72]">Emprunts actifs</span>
                    <span class="font-bold text-[#2B1F1A]">28</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-[#7C8C72]">Réservations en attente</span>
                    <span class="font-bold text-[#2B1F1A]">5</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-[#7C8C72]">Retours en retard</span>
                    <span class="font-bold text-[#2B1F1A]">2</span>
                </div>
            </div>
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
