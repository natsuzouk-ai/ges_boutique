<!DOCTYPE html>
<html>
<head>
    <title>Gestion Boutique</title>

    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">
</head>
<body>

<form action="{{ route('produits.update',$produit->id) }}"
method="POST">

@csrf
@method('PUT')

<input type="text"
name="reference"
value="{{ $produit->reference }}">

<br><br>

<input type="text"
name="designation"
value="{{ $produit->designation }}">

<br><br>

<input type="number"
step="0.01"
name="prix_unitaire"
value="{{ $produit->prix_unitaire }}">

<br><br>

<input type="number"
name="stock"
value="{{ $produit->stock }}">

<br><br>

<textarea name="description">
{{ $produit->description }}
</textarea>

<br><br>

<button type="submit">
Modifier
</button>

</form>

</body>
</html>