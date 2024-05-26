<?php

namespace App\Http\Controllers;

use App\Models\Bon_entres;
use App\Models\Detail_bon_entres;
use App\Models\Vendeur;
use App\Models\Produit;
use App\Models\Conditionnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BonEntresController  extends Controller
{
    public function index()
    {
        $bon_entres = Bon_entres::all();
        return view('bon_entres.index', compact('bon_entres'));
    }

    public function create()
    {
        $vendeurs = Vendeur::all();
        $produits = Produit::all();
        $conditionnements = Conditionnement::all();
        return view('bon_entres.create', compact('vendeurs', 'produits', 'conditionnements'));
    }
    public function showDetails($id)
{
    $bon_entre = Bon_entres::findOrFail($id);
    $detail_bon_entres = $bon_entre->detail_bon_entres;

    return view('bon_entres.details', compact('bon_entre', 'detail_bon_entres'));
}

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'vendeur_id' => 'required|exists:vendeurs,id',
            'date_entre' => 'required|date',
            'date_sortie' => 'required|date',
            'observation' => 'required|string',
            'details.*.produit_id' => 'required|exists:produits,id',
            'details.*.quantite' => 'required|integer',
            'details.*.prix' => 'required|integer',
            'details.*.conditionnement_id' => 'required|exists:conditionnements,id',
        ]);

        $bon_entre = Bon_entres::create($request->only(['date', 'vendeur_id', 'date_entre', 'date_sortie', 'observation']));

        foreach ($request->details as $detail) {
            Detail_bon_entres::create([
                'bon_entre_id' => $bon_entre->id,
                'produit_id' => $detail['produit_id'],
                'quantite' => $detail['quantite'],
                'prix' => $detail['prix'],
                'conditionnement_id' => $detail['conditionnement_id'],
            ]);
        }

        return redirect()->route('bon_entres.index')->with('success', 'Bon d\'entrée créé avec succès.');
    }

    public function edit(Bon_entres $bon_entre)
    {
        $vendeurs = Vendeur::all();
        $produits = Produit::all();
        $conditionnements = Conditionnement::all();
        return view('bon_entres.edit', compact('bon_entre', 'vendeurs', 'produits', 'conditionnements'));
    }

    public function update(Request $request, Bon_entres $bon_entre)
    {
        $request->validate([
            'date' => 'required|date',
            'vendeur_id' => 'required|exists:vendeurs,id',
            'date_entre' => 'required|date',
            'date_sortie' => 'required|date',
            'observation' => 'required|string',
            'details.*.produit_id' => 'required|exists:produits,id',
            'details.*.quantite' => 'required|integer',
            'details.*.prix' => 'required|integer',
            'details.*.conditionnement_id' => 'required|exists:conditionnements,id',
        ]);

        $bon_entre->update($request->only(['date', 'vendeur_id', 'date_entre', 'date_sortie', 'observation']));


        return redirect()->route('bon_entres.index')->with('success', 'Bon d\'entrée mis à jour avec succès.');
    }

    public function destroy(Bon_entres $bon_entre)
    {
        Detail_bon_entres::where('bon_entre_id', $bon_entre->id)->delete();
        $bon_entre->delete();

        return redirect()->route('bon_entres.index')->with('success', 'Bon d\'entrée supprimé avec succès.');
    }
}
