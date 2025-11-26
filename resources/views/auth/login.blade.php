@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">

        <h2 class="text-3xl font-serif text-center mb-6">Connexion</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C6A15B]"
                >
            </div>

            <div class="mb-4">
                <label class="block text-sm mb-1">Mot de passe</label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C6A15B]"
                >
            </div>

            <div class="flex items-center justify-between mb-4">
                <div>
                    <input type="checkbox" name="remember" id="remember" class="mr-1">
                    <label for="remember" class="text-sm">
                        Se souvenir de moi
                    </label>
                </div>

                <a href="{{ route('password.request') }}" class="text-[#C6A15B] text-sm hover:underline">
                    Mot de passe oublié ?
                </a>
            </div>

            <button type="submit"
                class="w-full bg-[#2B1F1A] text-[#FCFAF7] py-2 rounded-2xl hover:opacity-90 transition">
                Se connecter
            </button>

            <p class="text-center text-sm mt-4 text-[#7C8C72]">
                Pas encore inscrit ?
                <a href="{{ route('register') }}" class="text-[#C6A15B] hover:underline">
                    Créer un compte
                </a>
            </p>

        </form>
    </div>
</div>
@endsection
