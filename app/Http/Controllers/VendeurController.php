<?php
namespace App\Http\Controllers;

use App\Models\Vendeur;
use Illuminate\Http\Request;

class VendeurController extends Controller
{
    public function index()
    {
        $vendeurs = Vendeur::latest()->paginate(10);
        return view('vendeurs.index', compact('vendeurs'));
    }
    

    public function create()
    {
        return view('vendeurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
        ]);

        Vendeur::create($request->all());

        return redirect()->route('vendeurs.index')->with('success', 'Vendeur ajouté avec succès.');
    }

    public function show(Vendeur $vendeur)
    {
        return view('vendeurs.show', compact('vendeur'));
    }

    public function edit(Vendeur $vendeur)
    {
        return view('vendeurs.edit', compact('vendeur'));
    }

    public function update(Request $request, Vendeur $vendeur)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
        ]);

        $vendeur->update($request->all());

        return redirect()->route('vendeurs.index')->with('success', 'Vendeur mis à jour avec succès.');
    }

    public function destroy(Vendeur $vendeur)
    {
        $vendeur->delete();

        return redirect()->route('vendeurs.index')->with('success', 'Vendeur supprimé avec succès.');
    }
}
