<?php

// app/Models/Bon_entres.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bon_entres extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'vendeur_id',
        'date_entre',
        'date_sortie',
        'observation'
    ];

    public function vendeur()
    {
        return $this->belongsTo(Vendeur::class);
    }

    public function detail_bon_entres()
    {
        return $this->hasMany(Detail_bon_entres::class, 'bon_entre_id');
    }
}

