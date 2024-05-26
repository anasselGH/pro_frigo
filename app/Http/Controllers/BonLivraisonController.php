<?php

namespace App\Http\Controllers;

use App\Models\BonLivraison;
use App\Models\DetailBonLivraison;
use App\Models\Client;
use App\Models\Vendeur;
use App\Models\Produit;
use App\Models\Conditionnement;
use Illuminate\Http\Request;

class BonLivraisonController extends Controller
{
    public function index()
    {
        $bon_livraisons = BonLivraison::all();
        return view('bon_livraisons.index', compact('bon_livraisons'));
    }

    public function create()
    {
        $clients = Client::all();
        $vendeurs = Vendeur::all();
        $produits = Produit::all();
        $conditionnements = Conditionnement::all();
        return view('bon_livraisons.create', compact('clients', 'vendeurs', 'produits', 'conditionnements'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'date' => 'required|date',
            'client_id' => 'required|exists:clients,id',
            'vendeur_id' => 'required|exists:vendeurs,id',
            'observation' => 'required|string',
            'details.*.produit_id' => 'required|exists:produits,id',
            'details.*.quantite' => 'required|integer',
            'details.*.prix_vente' => 'required|numeric',
            'details.*.conditionnement_id' => 'required|exists:conditionnements,id',
        ]);
    
        // Create the bon livraison
        $bon_livraison = BonLivraison::create($request->only(['date', 'client_id', 'vendeur_id', 'observation']));
    
        // Check if details is present and is an array
        if (is_array($request->details)) {
            // Create the detail bon livraisons
            foreach ($request->details as $detail) {
                $bon_livraison->detail_bon_livraisons()->create($detail);
            }
        }
    
        // Redirect to the index with success message
        return redirect()->route('bon_livraisons.index')->with('success', 'Bon de livraison created successfully.');
    }
    

    public function showDetails($id)
    {
        $bon_livraison = BonLivraison::findOrFail($id);
        $detail_bon_livraisons = $bon_livraison->detail_bon_livraisons;
        return view('bon_livraisons.details', compact('bon_livraison', 'detail_bon_livraisons'));
    }

    public function edit($id)
    {
        $bon_livraison = BonLivraison::findOrFail($id);
        $clients = Client::all();
        $vendeurs = Vendeur::all();
        return view('bon_livraisons.edit', compact('bon_livraison', 'clients', 'vendeurs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'client_id' => 'required|exists:clients,id',
            'vendeur_id' => 'required|exists:vendeurs,id',
            'observation' => 'required|string'
        ]);

        $bon_livraison = BonLivraison::findOrFail($id);
        $bon_livraison->update($request->only(['date', 'client_id', 'vendeur_id', 'observation']));

        return redirect()->route('bon_livraisons.index')->with('success', 'Bon de livraison updated successfully.');
    }

    public function editDetail($id)
    {
        $detail_bon_livraison = DetailBonLivraison::findOrFail($id);
        $produits = Produit::all();
        $conditionnements = Conditionnement::all();
        
        return view('bon_livraisons.edit_detail', compact('detail_bon_livraison', 'produits', 'conditionnements'));
    }
    

    public function updateDetail(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer',
            'prix_vente' => 'required|numeric',
            'conditionnement_id' => 'required|exists:conditionnements,id',
        ]);

        // Find the detail_bon_livraison to update
        $detail_bon_livraison = DetailBonLivraison::findOrFail($id);
        
        // Update the detail_bon_livraison with the new data
        $detail_bon_livraison->update($request->only(['produit_id', 'quantite', 'prix_vente', 'conditionnement_id']));

        // Redirect to the showDetails route with the bon_livraison_id
        return redirect()->route('bon_livraisons.showDetails', $detail_bon_livraison->bon_livraison_id)
            ->with('success', 'Detail updated successfully.');
    }

    
    


    public function destroy($id)
    {
        $bon_livraison = BonLivraison::findOrFail($id);
        $bon_livraison->detail_bon_livraisons()->delete();
        $bon_livraison->delete();

        return redirect()->route('bon_livraisons.index')->with('success', 'Bon de livraison deleted successfully.');
    }

    public function showAddDetailForm($id)
    {
        $bon_livraison = BonLivraison::findOrFail($id);
        $produits = Produit::all();
        $conditionnements = Conditionnement::all();
    
        return view('bon_livraisons.add_detail', compact('bon_livraison', 'produits', 'conditionnements'));
    }
    
    public function addDetail(Request $request, $id)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer',
            'prix_vente' => 'required|numeric',
            'conditionnement_id' => 'required|exists:conditionnements,id',
        ]);

        $bon_livraison = BonLivraison::findOrFail($id);
        $bon_livraison->detail_bon_livraisons()->create($request->only(['produit_id', 'quantite', 'prix_vente', 'conditionnement_id']));

        return redirect()->route('bon_livraisons.showDetails', $id)->with('success', 'Detail added successfully.');
    }

    public function deleteDetail($id, $detail)
    {
        $detail_bon_livraison = DetailBonLivraison::findOrFail($detail);
        $detail_bon_livraison->delete();
    
        return back()->with('success', 'Detail deleted successfully.');
    }
}
