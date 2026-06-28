@extends('layouts.app')

@section('content')

<div class="facture">

<div class="facture-header">

<h1>BOUTIQUE DE ALI</h1>

<p>N'Djamena - Tchad</p>

<hr>

</div>

<h2>FACTURE</h2>

<p>

<strong>Numéro :</strong>

{{ $facture->id }}

</p>

<p>

<strong>Date :</strong>

{{ $facture->date_facture }}

</p>

<p>

<strong>Client :</strong>

{{ $facture->commande->client->nom }}

{{ $facture->commande->client->prenom }}

</p>

<p>

<strong>Montant :</strong>

{{ number_format($facture->montant_total,2) }}

FCFA

</p>

<br>

<div class="actions">

<button
onclick="window.print()"
class="btn btn-primary">

🖨 Imprimer

</button>

<a href="{{ route('factures.pdf',$facture->id) }}"
class="btn btn-success">

📄 Télécharger PDF

</a>

<a href="{{ route('factures.index') }}"
class="btn btn-secondary">

⬅ Retour

</a>

</div>

<br><br>

<div style="text-align:right;">

Signature

<br><br><br>

_____________________

</div>

</div>

@endsection