<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $fillable = [
        'commande_id',
        'numero',
        'date_facture',
        'montant_total'
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}