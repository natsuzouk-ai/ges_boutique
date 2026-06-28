@extends('layouts.app')

@section('content')

<h1>Gestion des Factures</h1>

<a href="{{ route('factures.create') }}" class="btn-primary:hover">
    Ajouter Facture
</a>
<form action="{{ route('factures.index') }}" method="GET">

<div style="display:flex;gap:10px;margin-bottom:20px;">

<input type="text"
       name="recherche"
       class="form-control"
       placeholder="Rechercher une facture...">

<button class="btn btn-primary">

🔍 Rechercher

</button>

</div>

</form>

<table class="table">

<tr>
    <th>ID</th>
    <th>Commande</th>
    <th>Date</th>
    <th>Montant</th>
    <th>Actions</th>
</tr>

@foreach($factures as $facture)

<tr>

<td>{{ $facture->id }}</td>
<td>{{ $facture->commande_id }}</td>
<td>{{ $facture->date_facture }}</td>
<td>{{ $facture->montant_total }}</td>

<td>

<a href="{{ route('factures.show',$facture->id) }}" class="btn btn-success">
Voir
</a>

<a href="{{ route('factures.edit', $facture->id) }}" class="btn-primary">
    ✏ Modifier
</a>

<form action="{{ route('factures.destroy',$facture->id) }}"
method="POST"
style="display:inline;">

@csrf
@method('DELETE')

<button
class="btn btn-danger"

onclick="return confirm('Voulez-vous supprimer cette facture ?')">

🗑 Supprimer

</button>

</form>

</td>

</tr>

@endforeach

</table>

@endsection