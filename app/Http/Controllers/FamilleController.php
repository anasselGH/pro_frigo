<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use Illuminate\Http\Request;

class FamilleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $familles = Famille::all();
        return view('familles.index', compact('familles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('familles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        Famille::create($request->all());

        return redirect()->route('familles.index')
            ->with('success', 'Famille ajoutée avec succès.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Famille $famille)
    {
        return view('familles.show', compact('famille'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Famille $famille)
    {
        return view('familles.edit', compact('famille'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Famille $famille)
    {
        $request->validate([
            'famille' => 'required|string|max:255',
        ]);

        $famille->update($request->all());

        return redirect()->route('familles.index')
            ->with('success', 'Famille mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Famille $famille)
    {
        $famille->delete();

        return redirect()->route('familles.index')
            ->with('success', 'Famille supprimée avec succès.');
    }
}
