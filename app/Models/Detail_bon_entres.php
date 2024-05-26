<?php

// app/Models/Detail_bon_entres.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_bon_entres extends Model
{
    use HasFactory;

    protected $fillable = [
        'bon_entre_id',
        'produit_id',
        'quantite',
        'prix',
        'conditionnement_id'
    ];

    public function bon_entre()
    {
        return $this->belongsTo(Bon_entres::class, 'bon_entre_id');
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

