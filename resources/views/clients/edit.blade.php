<!DOCTYPE html>
<html>
<head>
    <title>Gestion Boutique</title>

    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">
</head>
<body>

<h2>Modifier un Client</h2>

<form action="{{ route('clients.update',$client->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <input type="text"
           name="nom"
           value="{{ $client->nom }}">

    <br><br>

    <input type="text"
           name="prenom"
           value="{{ $client->prenom }}">

    <br><br>

    <input type="text"
           name="telephone"
           value="{{ $client->telephone }}">

    <br><br>

    <input type="text"
           name="adresse"
           value="{{ $client->adresse }}">

    <br><br>

    <input type="email"
           name="email"
           value="{{ $client->email }}">

    <br><br>

    <button type="submit">
        Modifier
    </button>

</form>

</body>
</html>