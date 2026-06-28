@extends('layouts.app')

@section('content')

<h1>Gestion des Clients</h1>

<a href="{{ route('clients.create') }}" class="btn-primary:hover">
Ajouter Client
</a>
<form action="{{ route('clients.index') }}" method="GET">

<div style="display:flex;gap:10px;margin-bottom:20px;">

<input type="text"
       name="recherche"
       value="{{ request('recherche') }}"
       class="form-control"
       placeholder="Rechercher un client...">

<button class="btn btn-primary">

🔍 Rechercher

</button>

<a href="{{ route('clients.create') }}"
   class="btn btn-success">

➕ Nouveau Client

</a>

</div>

</form>

<table class="table">

<tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Téléphone</th>
    <th>Adresse</th>
    <th>Email</th>
    <th>Actions</th>
</tr>

@foreach($clients as $client)

<tr>

<td>{{ $client->id }}</td>
<td>{{ $client->nom }}</td>
<td>{{ $client->prenom }}</td>
<td>{{ $client->telephone }}</td>
<td>{{ $client->adresse }}</td>
<td>{{ $client->email }}</td>

<td>

<a href="{{ route('clients.edit',$client->id) }}"
class="btn-primary">
✏ Modifier
</a>

<form action="{{ route('clients.destroy',$client->id) }}"
      method="POST"
      style="display:inline;">

@csrf
@method('DELETE')

<button
class="btn btn-danger"

onclick="return confirm('Voulez-vous vraiment supprimer ce client ?')">

🗑 Supprimer

</button>

</form>

</td>

</tr>

@endforeach

</table>
{{ $clients->links() }}

@endsection