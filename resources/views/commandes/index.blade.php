@extends('layouts.app')

@section('content')

<h2>Gestion des Commandes</h2>

<div class="card">

<form action="{{ route('commandes.index') }}" method="GET">

<div class="search-bar">

<input type="text"
name="recherche"
class="form-control"
placeholder="Rechercher une commande...">

<button class="btn btn-primary">

🔍 Rechercher

</button>

<a href="{{ route('commandes.create') }}"
class="btn btn-success">

➕ Nouvelle Commande

</a>

</div>

</form>

<table class="table">

<thead>

<tr>

<th>N°</th>

<th>Client</th>

<th>Date</th>

<th>Total</th>

<th>Actions</th>

</tr>

</thead>

<tbody>

@foreach($commandes as $commande)

<tr>

<td>{{ $commande->id }}</td>

<td>

{{ $commande->client->nom }}

{{ $commande->client->prenom }}

</td>

<td>

{{ $commande->date_commande }}

</td>

<td>

{{ number_format($commande->montant_total,2) }}

FCFA

</td>

<td>

@if($commande->facture)

<a href="{{ route('factures.show',$commande->facture->id) }}"
class="btn btn-success">

📄 Détail

</a>

@endif

<a href="{{ route('commandes.edit',$commande->id) }}"
class="btn btn-primary">

✏ Modifier

</a>

<form action="{{ route('commandes.destroy',$commande->id) }}"
method="POST"
style="display:inline;">

@csrf
@method('DELETE')

<button class="btn btn-danger"
onclick="return confirm('Supprimer cette commande ?')">

🗑 Supprimer

</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

{{ $commandes->links() }}

</div>

@endsection