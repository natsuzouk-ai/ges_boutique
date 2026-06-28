<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Liste des produits
     */
    public function index(Request $request)
    {
        $recherche = $request->recherche;

        $produits = Produit::when($recherche, function ($query) use ($recherche) {

            $query->where('reference', 'like', "%$recherche%")
                  ->orWhere('designation', 'like', "%$recherche%")
                  ->orWhere('categorie', 'like', "%$recherche%");

        })
        ->orderBy('id', 'asc')
        ->paginate(10);

        return view('produits.index',
            compact('produits', 'recherche'));
    }

    /**
     * Formulaire d'ajout
     */
    public function create()
    {
        return view('produits.create');
    }

    /**
     * Enregistrer
     */
    public function store(Request $request)
    {
        $request->validate([

            'reference'      => 'required|unique:produits',
            'designation'    => 'required',
            'prix_unitaire'  => 'required|numeric|min:1',
            'stock'          => 'required|integer|min:0',
            'description'    => 'nullable'

        ]);

        Produit::create($request->all());

        return redirect()
                ->route('produits.index')
                ->with('success',
                'Produit ajouté avec succès.');
    }

    /**
     * Modifier
     */
    public function edit(Produit $produit)
    {
        return view('produits.edit',
                compact('produit'));
    }

    /**
     * Mise à jour
     */
    public function update(Request $request,
                           Produit $produit)
    {

        $request->validate([

            'reference' =>
            'required|unique:produits,reference,' .
            $produit->id,

            'designation'   => 'required',

            'prix_unitaire' =>
            'required|numeric|min:1',

            'stock' =>
            'required|integer|min:0',

            'description' => 'nullable'

        ]);

        $produit->update($request->all());

        return redirect()
                ->route('produits.index')
                ->with('success',
                'Produit modifié avec succès.');

    }

    /**
     * Supprimer
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();

        return redirect()
                ->route('produits.index')
                ->with('success',
                'Produit supprimé avec succès.');
    }
}