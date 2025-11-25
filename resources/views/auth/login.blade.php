@extends('layouts.app')

@section('title', 'Connexion - Library App')

@section('content')
<div class="login-body flex justify-center items-start">
    <div class="login-form w-full max-w-md bg-cream p-8 rounded-2xl shadow-md">
        <h1 class="home-title mb-6 text-3xl md:text-4xl font-serif text-center">Connexion</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email" class="block mb-2 font-serif text-espresso">Email</label>
            <input type="email" id="email" name="email" placeholder="Votre email" class="login-input mb-4" required autofocus>

            <label for="password" class="block mb-2 font-serif text-espresso">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Votre mot de passe" class="login-input mb-4" required>

            <div class="flex items-center justify-between mb-4">
                <div>
                    <input type="checkbox" name="remember" id="remember" class="mr-1">
                    <label for="remember" class="text-sm text-espresso">Se souvenir de moi</label>
                </div>
                <a href="{{ route('password.request') }}" class="text-gold text-sm hover:underline">Mot de passe oublié ?</a>
            </div>

            <div class="text-center mt-6">
                <button type="submit" class="login-button w-full">Se connecter</button>
            </div>
        </form>

        <p class="text-center text-sage mt-4 text-sm">
            Pas encore inscrit ? <a href="{{ route('register') }}" class="text-gold hover:underline">Créer un compte</a>
        </p>
    </div>
</div>
@endsection
