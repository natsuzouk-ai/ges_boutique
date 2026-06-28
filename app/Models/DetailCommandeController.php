<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\DetailCommande;
use App\Models\Produit;
use Illuminate\Http\Request;

class DetailCommandeController extends Controller
{
    public function index()
    {
        $details = DetailCommande::with(
            'commande',
            'produit'
        )->paginate(10);

        return view(
            'detail_commandes.index',
            compact('details')
        );
    }

    public function show(DetailCommande $detailCommande)
    {
        return view(
            'detail_commandes.show',
            compact('detailCommande')
        );
    }
}