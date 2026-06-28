@extends('layouts.app')

@section('content')

<h1>Gestion des Produits</h1>

<a href="{{ route('produits.create') }}" class="btn-primary:hover">
Ajouter Produit
</a>
<form action="{{ route('produits.index') }}" method="GET">

<div style="display:flex;gap:10px;margin-bottom:20px;">

<input type="text"
       name="recherche"
       value="{{ request('recherche') }}"
       class="form-control"
       placeholder="Rechercher un produit...">

<button class="btn btn-primary">

🔍 Rechercher

</button>

<a href="{{ route('produits.create') }}"
class="btn btn-success">

➕ Nouveau Produit

</a>

</div>

</form>

<table class="table">

<tr>
<th>ID</th>
<th>Référence</th>
<th>Désignation</th>
<th>Prix</th>
<th>Stock</th>
<th>Actions</th>
</tr>

@foreach($produits as $produit)

<tr>

<td>{{ $produit->id }}</td>
<td>{{ $produit->reference }}</td>
<td>{{ $produit->designation }}</td>
<td>{{ $produit->prix_unitaire }}</td>
<td>

@if($produit->stock==0)

<span class="badge badge-danger">

Rupture

</span>

@elseif($produit->stock<5)

<span class="badge badge-warning">

{{ $produit->stock }}

</span>

@else

<span class="badge badge-success">

{{ $produit->stock }}

</span>

@endif

</td>

<td>

<a href="{{ route('produits.edit',$produit->id) }}"
class="btn-primary">
✏ Modifier
</a>

<form action="{{ route('produits.destroy',$produit->id) }}"
method="POST"
style="display:inline;">

@csrf
@method('DELETE')

<button
class="btn btn-danger"

onclick="return confirm('Voulez-vous supprimer ce produit ?')">

🗑 Supprimer

</button>

</form>

</td>

</tr>

@endforeach

</table>
{{ $produits->links() }}

@endsection