<!DOCTYPE html>
<html>
<head>
    <title>Gestion Boutique</title>

    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">
</head>
<body>

<h2>Modifier Commande</h2>

<form action="{{ route('commandes.update',$commande->id) }}"
method="POST">

@csrf
@method('PUT')

<select name="client_id">

@foreach($clients as $client)

<option value="{{ $client->id }}"
@if($client->id == $commande->client_id)
selected
@endif>

{{ $client->nom }}
{{ $client->prenom }}

</option>

@endforeach

</select>

<br><br>

<input type="date"
name="date_commande"
value="{{ $commande->date_commande }}">

<br><br>

<input type="number"
step="0.01"
name="montant_total"
value="{{ $commande->montant_total }}">

<br><br>

<button type="submit">
Modifier
</button>

</form>

</body>
</html>