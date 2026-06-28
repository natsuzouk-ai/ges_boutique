@extends('layouts.app')

@section('content')

<div class="card">

    <h2>📦 Ajouter un Produit</h2>

    <hr><br>

    <form action="{{ route('produits.store') }}" method="POST">

        @csrf

        <div class="form-group">

            <label>Référence</label>

            <input
                type="text"
                name="reference"
                class="form-control"
                value="{{ old('reference') }}"
                placeholder="Ex : PRD001"
                required>

        </div>

        <br>

        <div class="form-group">

            <label>Désignation</label>

            <input
                type="text"
                name="designation"
                class="form-control"
                value="{{ old('designation') }}"
                placeholder="Nom du produit"
                required>

        </div>

        <br>

        <br>

        <div class="form-group">

            <label>Prix unitaire</label>

            <input
                type="number"
                step="0.01"
                name="prix_unitaire"
                class="form-control"
                value="{{ old('prix_unitaire') }}"
                placeholder="0.00"
                required>

        </div>

        <br>

        <div class="form-group">

            <label>Stock</label>

            <input
                type="number"
                name="stock"
                class="form-control"
                value="{{ old('stock') }}"
                placeholder="Quantité disponible"
                required>

        </div>

        <br>

        <div class="form-group">

            <label>Description</label>

            <textarea
                name="description"
                class="form-control"
                rows="5"
                placeholder="Description du produit">{{ old('description') }}</textarea>

        </div>

        <br>

        <button type="submit" class="btn btn-success">

            💾 Enregistrer

        </button>

        <a href="{{ route('produits.index') }}" class="btn btn-danger">

            ❌ Annuler

        </a>

    </form>

</div>

@endsection