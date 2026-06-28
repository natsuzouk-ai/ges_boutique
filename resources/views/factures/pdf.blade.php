<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">

<style>

body{
    font-family: DejaVu Sans, Arial;
    font-size:14px;
}

h1,h2{
    text-align:center;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

th,td{
    border:1px solid #000;
    padding:10px;
}

</style>

</head>
<body>

<h2>BOUTIQUE DE ALI</h2>
<p style="text-align:center;">
Gestion Commerciale
</p>

<hr>

<h1>FACTURE</h1>

<table>

<tr>
<th>Numéro</th>
<td>{{ $facture->numero }}</td>
</tr>

<tr>
<th>Date</th>
<td>{{ $facture->date_facture }}</td>
</tr>

<tr>
<th>Client</th>
<td>
@if($facture->commande && $facture->commande->client)
{{ $facture->commande->client->nom }}
{{ $facture->commande->client->prenom }}
@else
Client introuvable
@endif
</td>
</tr>

<tr>
<th>Montant</th>
<td>{{ number_format($facture->montant_total,2) }} FCFA</td>
</tr>

</table>

<br><br><br>

<p>
Signature :
</p>

<br><br>

____________________________

</body>
</html>