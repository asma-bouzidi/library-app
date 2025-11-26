@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center text-center">

    <h1 class="text-5xl font-serif font-bold mb-4">Library</h1>

    <p class="text-lg text-[#7C8C72] mb-10 max-w-xl">
        Une bibliothèque élégante pour gérer vos livres avec style.
    </p>

    <div class="flex gap-4">
        <a href="{{ route('login') }}"
           class="px-8 py-3 rounded-2xl bg-[#2B1F1A] text-[#FCFAF7] hover:opacity-90 transition">
            Se connecter
        </a>

        <a href="{{ route('register') }}"
           class="px-8 py-3 rounded-2xl border border-[#2B1F1A] text-[#2B1F1A] hover:bg-[#2B1F1A] hover:text-[#FCFAF7] transition">
            Créer un compte
        </a>
    </div>

</div>
@endsection
