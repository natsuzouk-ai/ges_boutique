<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Liste des clients avec recherche et pagination
     */
    public function index(Request $request)
    {
        $recherche = $request->recherche;

        $clients = Client::when($recherche, function ($query) use ($recherche) {
                $query->where('nom', 'like', "%$recherche%")
                      ->orWhere('prenom', 'like', "%$recherche%")
                      ->orWhere('telephone', 'like', "%$recherche%");
            })
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('clients.index', compact('clients', 'recherche'));
    }

    /**
     * Formulaire d'ajout
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Enregistrer un client
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:100',
            'prenom' => 'required|max:100',
            'telephone' => 'required|max:20',
            'adresse' => 'required|max:255',
            'email' => 'required|email|unique:clients,email',
        ]);

        Client::create($request->all());

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client ajouté avec succès.');
    }

    /**
     * Modifier
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Mise à jour
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'nom' => 'required|max:100',
            'prenom' => 'required|max:100',
            'telephone' => 'required|max:20',
            'adresse' => 'required|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
        ]);

        $client->update($request->all());

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client modifié avec succès.');
    }

    /**
     * Supprimer
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client supprimé avec succès.');
    }
}