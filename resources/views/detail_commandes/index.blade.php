@extends('layouts.app')

@section('content')

<h2>Détails des Commandes</h2>

<table class="table">

<tr>

<th>Commande</th>

<th>Produit</th>

<th>Qté</th>

<th>Prix</th>

<th>Sous-total</th>

</tr>

@foreach($details as $detail)

<tr>

<td>

{{ $detail->commande->id }}

</td>

<td>

{{ $detail->produit->designation }}

</td>

<td>

{{ $detail->quantite }}

</td>

<td>

{{ number_format($detail->prix,2) }}

FCFA

</td>

<td>

{{ number_format($detail->sous_total,2) }}

FCFA

</td>

</tr>

@endforeach

</table>

{{ $details->links() }}

@endsection