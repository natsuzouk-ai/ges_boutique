@extends('layouts.app')

@section('content')

<h2>Tableau de bord</h2>
<div class="card">

<h3>

Bienvenue dans

Boutique De Ali

</h3>

<p>

Logiciel de Gestion de Boutique

</p>

<hr>

<p>

Vous pouvez gérer :

</p>

<ul>

<li>✔ Clients</li>

<li>✔ Produits</li>

<li>✔ Commandes</li>

<li>✔ Détails des commandes</li>

<li>✔ Factures</li>

</ul>

</div>

<div class="dashboard">

<div class="stat">

<h2>{{ $clients }}</h2>

<p>Clients</p>

</div>

<div class="stat">

<h2>{{ $produits }}</h2>

<p>Produits</p>

</div>

<div class="stat">

<h2>{{ $commandes }}</h2>

<p>Commandes</p>

</div>

<div class="stat">

<h2>{{ $factures }}</h2>

<p>Factures</p>

</div>

</div>
<div class="card">

<h2>Accès rapide</h2>

<div class="quick-actions">

<a href="{{ route('clients.create') }}"
class="btn btn-success">

➕ Ajouter un Client

</a>

<a href="{{ route('produits.create') }}"
class="btn btn-primary">

📦 Ajouter un Produit

</a>

<a href="{{ route('commandes.create') }}"
class="btn btn-warning">

🛒 Nouvelle Commande

</a>

</div>

</div>
<div class="card">

<h2>Bienvenue</h2>

<p>

Bienvenue dans le logiciel de gestion de

<strong>Boutique De Ali</strong>

</p>

<p>

Vous pouvez gérer :

</p>

<ul>

<li>✔ Les Clients</li>

<li>✔ Les Produits</li>

<li>✔ Les Commandes</li>

<li>✔ Les Factures</li>

<li>✔ Les Détails des commandes</li>

</ul>

</div>

@endsection