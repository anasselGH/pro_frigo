<?php
// app/Models/ReglementClient.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReglementClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 
        'montant', 
        'mode_reglement_id', 
        'observation', 
        'client_id', 
        'created_at', 
        'updated_at'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function modeReglement()
    {
        return $this->belongsTo(Mode_reglement::class);
    }
}

