@extends('layouts.app')

@section('content')

<div class="container">

<h2>🛒 Nouvelle Commande</h2>

<form action="{{ route('commandes.store') }}" method="POST">

@csrf

<div class="card">

<label>Client</label>

<select name="client_id" class="form-control" required>

<option value="">Choisir un client</option>

@foreach($clients as $client)

<option value="{{ $client->id }}">

{{ $client->nom }} {{ $client->prenom }}

</option>

@endforeach

</select>

<br>

<label>Date de commande</label>

<input type="date"
name="date_commande"
class="form-control"
value="{{ date('Y-m-d') }}">

</div>

<br>

<div class="card">

<h3>Produits</h3>

<table class="table">

<thead>

<tr>

<th>Produit</th>

<th>Prix</th>

<th>Quantité</th>

</tr>

</thead>

<tbody>

@foreach($produits as $produit)

<tr>

<td>

<input type="checkbox"
name="produit_id[]"
value="{{ $produit->id }}">

{{ $produit->designation }}

</td>

<td>

{{ number_format($produit->prix_unitaire,2) }} FCFA

</td>

<td>

<input type="number"
name="quantite[]"
value="1"
min="1"
class="form-control">

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

<br>

<button class="btn btn-primary">

💾 Enregistrer la commande

</button>

</form>

</div>

@endsection