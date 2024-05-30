<?php
// app/Http/Controllers/ReglementVendeurController.php

namespace App\Http\Controllers;

use App\Models\ReglementVendeur;
use App\Models\Vendeur;
use App\Models\Mode_reglement;
use Illuminate\Http\Request;

class ReglementVendeurController extends Controller
{
    public function index()
    {
        $reglement_vendeurs = ReglementVendeur::all();
        return view('reglement_vendeurs.index', compact('reglement_vendeurs'));
    }

    public function create()
    {
        $vendeurs = Vendeur::all();
        $mode_reglements = Mode_reglement::all();
        return view('reglement_vendeurs.create', compact('vendeurs', 'mode_reglements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'montant' => 'required|numeric',
            'mode_reglement_id' => 'required|exists:mode_reglements,id',
            'observation' => 'required|string',
            'vendeur_id' => 'required|exists:vendeurs,id',
        ]);

        ReglementVendeur::create($request->all());

        return redirect()->route('reglement_vendeurs.index')->with('success', 'Reglement vendeur created successfully.');
    }

    public function edit($id)
    {
        $reglement_vendeur = ReglementVendeur::findOrFail($id);
        $vendeurs = Vendeur::all();
        $mode_reglements = Mode_reglement::all();
        return view('reglement_vendeurs.edit', compact('reglement_vendeur', 'vendeurs', 'mode_reglements'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'montant' => 'required|numeric',
            'mode_reglement_id' => 'required|exists:mode_reglements,id',
            'observation' => 'required|string',
            'vendeur_id' => 'required|exists:vendeurs,id',
        ]);

        $reglement_vendeur = ReglementVendeur::findOrFail($id);
        $reglement_vendeur->update($request->all());

        return redirect()->route('reglement_vendeurs.index')->with('success', 'Reglement vendeur updated successfully.');
    }

    public function destroy($id)
    {
        $reglement_vendeur = ReglementVendeur::findOrFail($id);
        $reglement_vendeur->delete();

        return redirect()->route('reglement_vendeurs.index')->with('success', 'Reglement vendeur deleted successfully.');
    }
}
