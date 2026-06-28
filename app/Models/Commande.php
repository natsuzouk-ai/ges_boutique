<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'client_id',
        'date_commande',
        'montant_total',
        'etat'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function details()
    {
        return $this->hasMany(DetailCommande::class);
    }

    public function facture()
    {
        return $this->hasOne(Facture::class);
    }
}