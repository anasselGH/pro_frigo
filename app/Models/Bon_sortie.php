<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\DetailBonSortieController;
class Bon_sortie extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'vendeur_id',
        'observation'
    ];

    public function vendeur()
    {
        return $this->belongsTo(Vendeur::class);
    }

    public function detail_bon_sorties()
    {
        return $this->hasMany(Detail_bon_sortie::class, 'bon_sortie_id');
    }
}

