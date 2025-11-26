<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mot de passe oublié</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FCFAF7] flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
    <h2 class="text-2xl font-serif text-center text-[#2B1F1A] mb-6">
        Mot de passe oublié
    </h2>

    @if (session('status'))
        <div class="mb-4 text-green-600 text-sm text-center">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <input
            type="email"
            name="email"
            placeholder="Votre email"
            required
            class="w-full p-3 border rounded-xl mb-4 focus:outline-none focus:ring-2 focus:ring-[#C6A15B]"
        >

        <button
            type="submit"
            class="w-full bg-[#C6A15B] text-[#2B1F1A] py-2 rounded-2xl hover:bg-[#b08d4f]"
        >
            Envoyer le lien
        </button>
    </form>
</div>

</body>
</html>
