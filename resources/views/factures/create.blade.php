<!DOCTYPE html>
<html>
<head>
    <title>Gestion Boutique</title>

    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">
</head>
<body>

<h2>Nouvelle Facture</h2>

<form action="{{ route('factures.store') }}"
      method="POST">

@csrf

<label>Commande</label>

<select name="commande_id">

@foreach($commandes as $commande)

<option value="{{ $commande->id }}">
Commande N° {{ $commande->id }}
</option>

@endforeach

</select>

<br><br>

<label>Date Facture</label>

<input type="date"
       name="date_facture">

<br><br>

<label>Montant</label>

<input type="number"
       step="0.01"
       name="montant_total">

<br><br>

<button type="submit">
Enregistrer
</button>

</form>

</body>
</html>