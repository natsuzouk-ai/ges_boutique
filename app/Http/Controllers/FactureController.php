<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FactureController extends Controller
{
    public function index()
    {
        $factures = Facture::with('commande.client')
                    ->latest()
                    ->paginate(10);

        return view('factures.index',
                    compact('factures'));
    }

    public function show(Facture $facture)
    {
        $facture->load(
            'commande.client',
            'commande.details.produit'
        );

        return view(
            'factures.show',
            compact('facture')
        );
    }

    public function destroy(Facture $facture)
    {
        $facture->delete();

        return redirect()
                ->route('factures.index')
                ->with(
                    'success',
                    'Facture supprimée.'
                );
    }


public function pdf($id)
{
    $facture = Facture::with('commande.client')
                ->findOrFail($id);

    $pdf = Pdf::loadView('factures.pdf', compact('facture'));

    return $pdf->download('Facture_'.$facture->id.'.pdf');
}
}