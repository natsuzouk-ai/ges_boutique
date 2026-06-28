<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique De Ali</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

<div class="sidebar">

    <div class="logo">
        <h1>🛍</h1>
        <h2>Boutique De Ali</h2>
        <p>Gestion Commerciale</p>
    </div>

    <ul>

        <li>
            <a href="{{ url('/') }}">
                <i class="fa-solid fa-house"></i>
                Tableau de bord
            </a>
        </li>

        <li>
            <a href="{{ route('clients.index') }}">
                <i class="fa-solid fa-users"></i>
                Clients
            </a>
        </li>

        <li>
            <a href="{{ route('produits.index') }}">
                <i class="fa-solid fa-box"></i>
                Produits
            </a>
        </li>

        <li>
            <a href="{{ route('commandes.index') }}">
                <i class="fa-solid fa-cart-shopping"></i>
                Commandes
            </a>
        </li>

        <li>
            <a href="{{ route('apropos') }}">
                <i class="fa-solid fa-circle-info"></i>
                À propos
            </a>
        </li>

    </ul>

</div>

<div class="main">

    <div class="topbar">

        <h1>Logiciel de Gestion de Boutique</h1>

        <p>
            Bienvenue sur l'application de gestion de
            <strong>Boutique De Ali</strong>
        </p>

    </div>

    {{-- Message de succès --}}
    @if(session('success'))

        <div class="alert-success">
            {{ session('success') }}
        </div>

    @endif

    {{-- Message d'erreur --}}
    @if($errors->any())

        <div class="alert-danger">

            <ul>

                @foreach($errors->all() as $erreur)

                    <li>{{ $erreur }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    {{-- Contenu des pages --}}
    @yield('content')

</div>

<footer>

    © 2026 Boutique De Ali |
    Développé par <strong>David Zoukalne</strong>

</footer>

</body>

</html>