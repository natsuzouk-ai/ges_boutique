<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'reference',
        'designation',
        'prix_unitaire',
        'stock',
        'description',
    ];

    public function details()
    {
        return $this->hasMany(DetailCommande::class);
    }
}