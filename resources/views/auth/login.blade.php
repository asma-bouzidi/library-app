@extends('layouts.app')

@section('title', 'Connexion - Library App')

@section('content')
<div class="flex justify-center items-start">
    <div class="w-full max-w-md bg-[#F8F4EC] p-8 rounded-2xl shadow-sm">
        <h1 class="text-3xl md:text-4xl font-serif text-center mb-6 text-[#4B3621]">Connexion</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email" class="block mb-2 font-serif text-[#2B1F1A]">Email</label>
            <input type="email" id="email" name="email" placeholder="Votre email" class="w-full px-4 py-2 border border-[#D6CBB5] rounded-xl mb-4 focus:outline-none" required autofocus>

            <label for="password" class="block mb-2 font-serif text-[#2B1F1A]">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Votre mot de passe" class="w-full px-4 py-2 border border-[#D6CBB5] rounded-xl mb-4 focus:outline-none" required>

            <div class="flex items-center justify-between mb-4">
                <div>
                    <input type="checkbox" name="remember" id="remember" class="mr-1">
                    <label for="remember" class="text-sm text-[#2B1F1A]">Se souvenir de moi</label>
                </div>
                <a href="{{ route('password.request') }}" class="text-[#C6A15B] text-sm hover:underline">Mot de passe oublié ?</a>
            </div>

            <div class="text-center mt-6">
                <button type="submit" class="px-6 py-2 rounded-2xl bg-[#C6A15B] text-[#2B1F1A] font-serif hover:bg-[#b08d4f] transition-all w-full">Se connecter</button>
            </div>
        </form>

        <p class="text-center text-[#7C8C72] mt-4 text-sm">
            Pas encore inscrit ? <a href="{{ route('register') }}" class="text-[#C6A15B] hover:underline">Créer un compte</a>
        </p>
    </div>
</div>
@endsection
