@extends('layouts.app')

@section('title', 'Inscription - Library App')

@section('content')
<div class="register-body flex justify-center items-start">
    <div class="register-form w-full max-w-md bg-cream p-8 rounded-2xl shadow-md">
        <h1 class="home-title mb-6 text-3xl md:text-4xl font-serif text-center">Créer un compte</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="name" class="block mb-2 font-serif text-espresso">Nom complet</label>
            <input type="text" id="name" name="name" placeholder="Votre nom complet" class="register-input mb-4" required autofocus>

            <label for="email" class="block mb-2 font-serif text-espresso">Email</label>
            <input type="email" id="email" name="email" placeholder="Votre email" class="register-input mb-4" required>

            <label for="password" class="block mb-2 font-serif text-espresso">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Votre mot de passe" class="register-input mb-4" required>

            <label for="password_confirmation" class="block mb-2 font-serif text-espresso">Confirmez le mot de passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmez votre mot de passe" class="register-input mb-4" required>

            <div class="text-center mt-6">
                <button type="submit" class="register-button w-full">S'inscrire</button>
            </div>
        </form>

        <p class="text-center text-sage mt-4 text-sm">
            Déjà inscrit ? <a href="{{ route('login') }}" class="text-gold hover:underline">Se connecter</a>
        </p>
    </div>
</div>
@endsection
