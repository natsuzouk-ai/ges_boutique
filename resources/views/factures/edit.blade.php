<!DOCTYPE html>
<html>
<head>
    <title>Gestion Boutique</title>

    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">
</head>
<body>

<h2>Modifier Facture</h2>

<form action="{{ route('factures.update',$facture->id) }}"
      method="POST">

@csrf
@method('PUT')

<select name="commande_id">

@foreach($commandes as $commande)

<option value="{{ $commande->id }}"
@if($commande->id==$facture->commande_id)
selected
@endif>

Commande N° {{ $commande->id }}

</option>

@endforeach

</select>

<br><br>

<input type="date"
name="date_facture"
value="{{ $facture->date_facture }}">

<br><br>

<input type="number"
step="0.01"
name="montant_total"
value="{{ $facture->montant_total }}">

<br><br>

<button type="submit">
Modifier
</button>

</form>

</body>
</html>