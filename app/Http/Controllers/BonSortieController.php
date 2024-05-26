<?php
namespace App\Http\Controllers;

use App\Models\Bon_sortie;
use App\Models\Detail_bon_sortie;
use App\Models\Vendeur;
use App\Models\Produit;
use App\Models\Conditionnement;
use Illuminate\Http\Request;
class BonSortieController extends Controller
{
    public function index()
    {
        $bon_sorties = Bon_sortie::all();
        return view('bon_sorties.index', compact('bon_sorties'));
    }

    public function create()
    {
        $vendeurs = Vendeur::all();
        $produits = Produit::all();
        $conditionnements = Conditionnement::all();
        return view('bon_sorties.create', compact('vendeurs', 'produits', 'conditionnements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'vendeur_id' => 'required|exists:vendeurs,id',
            'observation' => 'required|string',
            'details.*.produit_id' => 'required|exists:produits,id',
            'details.*.quantite' => 'required|integer',
            'details.*.conditionnement_id' => 'required|exists:conditionnements,id',
        ]);

        $bon_sortie = Bon_sortie::create($request->only(['date', 'vendeur_id', 'observation']));

        foreach ($request->details as $detail) {
            $bon_sortie->detail_bon_sorties()->create($detail);
        }

        return redirect()->route('bon_sorties.index')->with('success', 'Bon de sortie created successfully.');
    }

    public function showDetails($id)
    {
        $bon_sortie = Bon_sortie::findOrFail($id);
        $detail_bon_sorties = $bon_sortie->detail_bon_sorties;
        $produits = Produit::all();
        $conditionnements = Conditionnement::all();

        return view('bon_sorties.details', compact('bon_sortie',"conditionnements", 'detail_bon_sorties',"produits"));
    }

    public function edit($id)
    {
        $bon_sortie = Bon_sortie::findOrFail($id);
        $vendeurs = Vendeur::all();
        return view('bon_sorties.edit', compact('bon_sortie', 'vendeurs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'vendeur_id' => 'required|exists:vendeurs,id',
            'observation' => 'required|string'
        ]);

        $bon_sortie = Bon_sortie::findOrFail($id);
        $bon_sortie->update($request->only(['date', 'vendeur_id', 'observation']));

        return redirect()->route('bon_sorties.index')->with('success', 'Bon de sortie updated successfully.');
    }
    public function editDetail($id)
    {
        $detail_bon_sortie = Detail_bon_sortie::findOrFail($id);
        $produits = Produit::all();
        $conditionnements = Conditionnement::all();
        
        return view('bon_sorties.edit_detail', compact('detail_bon_sortie', 'produits', 'conditionnements'));
    }
    

    public function updateDetail(Request $request, Detail_bon_sortie $detail_bon_sortie)
{
    $request->validate([
        'quantite' => 'required|integer',
        // Add validation rules for other fields if necessary
    ]);
    $detail_bon_sortie->update($request->all());

    return redirect()->route('bon_sorties.showDetails', $detail_bon_sortie->bon_sortie_id)
        ->with('success', 'Detail updated successfully.');
}
    public function destroy($id)
    {
        $bon_sortie = Bon_sortie::findOrFail($id);
        $bon_sortie->detail_bon_sorties()->delete();
        $bon_sortie->delete();

        return redirect()->route('bon_sorties.index')->with('success', 'Bon de sortie deleted successfully.');
    }

    public function showAddDetailForm($id)
    {
        $bon_sortie = Bon_sortie::findOrFail($id);
        $produits = Produit::all(); // Assuming you need to pass produits to the view
        $conditionnements = Conditionnement::all(); // Assuming you need to pass conditionnements to the view
    
        return view('bon_sorties.add_detail', compact('bon_sortie', 'produits', 'conditionnements'));
    }
    
    public function addDetail(Request $request, $id)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer',
            'conditionnement_id' => 'required|exists:conditionnements,id',
        ]);

        $bon_sortie = Bon_sortie::findOrFail($id);
        $bon_sortie->detail_bon_sorties()->create($request->only(['produit_id', 'quantite', 'conditionnement_id']));

        return redirect()->route('bon_sorties.showDetails', $id)->with('success', 'Detail added successfully.');
    }

    public function deleteDetail($id, $detail)
    {
        $detail_bon_sortie = Detail_bon_sortie::findOrFail($detail);
        $detail_bon_sortie->delete();
    
        return back()->with('success', 'Detail deleted successfully.');
    }
    
}
