@extends('layouts.app')

@section('title', 'Inscription - Library App')

@section('content')
<div class="flex justify-center items-start">
    <div class="w-full max-w-md bg-[#F8F4EC] p-8 rounded-2xl shadow-sm">
        <h1 class="text-3xl md:text-4xl font-serif text-center mb-6 text-[#4B3621]">Créer un compte</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="name" class="block mb-2 font-serif text-[#2B1F1A]">Nom complet</label>
            <input type="text" id="name" name="name" placeholder="Votre nom complet" class="w-full px-4 py-2 border border-[#D6CBB5] rounded-xl mb-4 focus:outline-none" required autofocus>

            <label for="email" class="block mb-2 font-serif text-[#2B1F1A]">Email</label>
            <input type="email" id="email" name="email" placeholder="Votre email" class="w-full px-4 py-2 border border-[#D6CBB5] rounded-xl mb-4 focus:outline-none" required>

            <label for="password" class="block mb-2 font-serif text-[#2B1F1A]">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Votre mot de passe" class="w-full px-4 py-2 border border-[#D6CBB5] rounded-xl mb-4 focus:outline-none" required>

            <label for="password_confirmation" class="block mb-2 font-serif text-[#2B1F1A]">Confirmez le mot de passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmez votre mot de passe" class="w-full px-4 py-2 border border-[#D6CBB5] rounded-xl mb-4 focus:outline-none" required>

            <div class="text-center mt-6">
                <button type="submit" class="px-6 py-2 rounded-2xl bg-[#C6A15B] text-[#2B1F1A] font-serif hover:bg-[#b08d4f] transition-all w-full">S'inscrire</button>
            </div>
        </form>

        <p class="text-center text-[#7C8C72] mt-4 text-sm">
            Déjà inscrit ? <a href="{{ route('login') }}" class="text-[#C6A15B] hover:underline">Se connecter</a>
        </p>
    </div>
</div>
@endsection
