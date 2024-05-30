<?php
// App/Http/Controllers/DetailBonEntresController.php

namespace App\Http\Controllers;

use App\Models\Detail_bon_entres;
use App\Models\Produit;
use App\Models\Conditionnement;
use Illuminate\Http\Request;

class DetailBonEntresController extends Controller
{
    public function create($bon_entre_id)
    {
        $produits = Produit::all();
        $conditionnements = Conditionnement::all();
        return view('detail_bon_entres.create', compact('bon_entre_id', 'produits', 'conditionnements'));
    }

    public function store(Request $request, $bon_entre_id)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer',
            'prix' => 'required|integer',
            'conditionnement_id' => 'required|exists:conditionnements,id',
        ]);

        Detail_bon_entres::create([
            'bon_entre_id' => $bon_entre_id,
            'produit_id' => $request->produit_id,
            'quantite' => $request->quantite,
            'prix' => $request->prix,
            'conditionnement_id' => $request->conditionnement_id,
        ]);

        return redirect()->route('bon_entres.details', $bon_entre_id)->with('success', 'Detail added successfully.');
    }

    public function edit($id)
    {
        $detail_bon_entres = Detail_bon_entres::findOrFail($id);
        $produits = Produit::all();
        $conditionnements = Conditionnement::all();
        return view('detail_bon_entres.edit', compact('detail_bon_entres', 'produits', 'conditionnements'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer',
            'prix' => 'required|integer',
            'conditionnement_id' => 'required|exists:conditionnements,id',
        ]);

        $detail_bon_entres = Detail_bon_entres::findOrFail($id);
        $detail_bon_entres->update($request->all());

        return redirect()->route('bon_entres.details', $detail_bon_entres->bon_entre_id)->with('success', 'Detail updated successfully.');
    }

    public function destroy($id)
    {
        $detail_bon_entres = Detail_bon_entres::findOrFail($id);
        $bon_entre_id = $detail_bon_entres->bon_entre_id;
        $detail_bon_entres->delete();

        return redirect()->route('bon_entres.details', $bon_entre_id)->with('success', 'Detail deleted successfully.');
    }
}

