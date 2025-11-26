@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-serif mb-10">Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    <div class="bg-white p-6 rounded-2xl shadow">
        <h3 class="text-lg text-[#7C8C72]">Livres</h3>
        <p class="text-3xl font-bold mt-2">120</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow">
        <h3 class="text-lg text-[#7C8C72]">Auteurs</h3>
        <p class="text-3xl font-bold mt-2">45</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow">
        <h3 class="text-lg text-[#7C8C72]">Utilisateurs</h3>
        <p class="text-3xl font-bold mt-2">10</p>
    </div>

</div>
@endsection
