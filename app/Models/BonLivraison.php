<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonLivraison extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'observation', 'client_id', 'vendeur_id'];

    public function detail_bon_livraisons()
    {
        return $this->hasMany(DetailBonLivraison::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function vendeur()
    {
        return $this->belongsTo(Vendeur::class);
    }
}

