<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Blackwood Archives</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-[#2B1F1A] min-h-screen">

    @auth
        @include('layouts.sidebar_modern')

        <div class="ml-64">
            @endif

            <main class="py-12 px-6">
                @yield('content')
            </main>

        @auth
        </div>
    @endauth
@include('layouts.footer')
</body>

</html>
