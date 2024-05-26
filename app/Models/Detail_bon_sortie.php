<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_bon_sortie extends Model
{
    use HasFactory;

    protected $fillable = [
        'bon_sortie_id',
        'produit_id',
        'quantite',
        'conditionnement_id'
    ];

    public function bon_sortie()
    {
        return $this->belongsTo(Bon_sortie::class, 'bon_sortie_id');
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
