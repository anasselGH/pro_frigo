<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBonLivraison extends Model
{
    use HasFactory;

    protected $fillable = [
        'bon_livraison_id',
        'produit_id',
        'conditionnement_id',
        'prix_vente',
        'quantite',
    ];

    // Relationships
    public function bonLivraison()
    {
        return $this->belongsTo(BonLivraison::class);
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    public function conditionnement()
    {
        return $this->belongsTo(Conditionnement::class);
    }
}

