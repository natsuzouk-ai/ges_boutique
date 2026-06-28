<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\DetailCommande;
use App\Models\Facture;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::with('client','facture')
                    ->orderBy('id', 'asc')
                    ->paginate(10);

        return view('commandes.index',
            compact('commandes'));
    }

    public function create()
    {
        $clients = Client::all();
        $produits = Produit::all();

        return view('commandes.create',
            compact('clients','produits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id'=>'required',
            'date_commande'=>'required',
            'produit_id'=>'required|array',
            'quantite'=>'required|array'
        ]);

        DB::beginTransaction();

        try{

            $commande = Commande::create([
                'client_id'=>$request->client_id,
                'date_commande'=>$request->date_commande,
                'montant_total'=>0,
                'etat'=>'Payée'
            ]);

            $total = 0;

            foreach($request->produit_id as $key=>$produit){

                $p = Produit::findOrFail($produit);

                $qte = $request->quantite[$key];

                $sousTotal = $p->prix_unitaire * $qte;

                DetailCommande::create([
                    'commande_id'=>$commande->id,
                    'produit_id'=>$p->id,
                    'quantite'=>$qte,
                    'prix'=>$p->prix_unitaire,
                    'sous_total'=>$sousTotal
                ]);

                $p->stock -= $qte;
                $p->save();

                $total += $sousTotal;

            }

            $commande->update([
                'montant_total'=>$total
            ]);

            Facture::create([
                'commande_id'=>$commande->id,
                'numero'=>'FAC-'.date('Y').'-'.$commande->id,
                'date_facture'=>now(),
                'montant_total'=>$total
            ]);

            DB::commit();

            return redirect()->route('commandes.index')
            ->with('success','Commande enregistrée.');

        }catch(\Exception $e){

            DB::rollBack();

            return back()->withErrors($e->getMessage());

        }

    }

    public function destroy(Commande $commande)
    {
        $commande->delete();

        return redirect()
            ->route('commandes.index')
            ->with('success',
            'Commande supprimée.');
    }
}