<?php

// app/Http/Controllers/ReglementClientController.php

namespace App\Http\Controllers;

use App\Models\ReglementClient;
use App\Models\Client;
use App\Models\Mode_reglement;
use Illuminate\Http\Request;

class ReglementClientController extends Controller
{
    public function index()
    {
        $reglement_clients = ReglementClient::all();
        return view('reglement_clients.index', compact('reglement_clients'));
    }

    public function create()
    {
        $clients = Client::all();
        $mode_reglements = Mode_reglement::all();
        return view('reglement_clients.create', compact('clients', 'mode_reglements'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'date' => 'required|date',
        //     'montant' => 'required|numeric',
        //     'mode_reglement_id' => 'required|exists:mode_reglements,id',
        //     'observation' => 'required|string',
        //     'client_id' => 'required|exists:clients,id',
        // ]);

        ReglementClient::create($request->all());

        return redirect()->route('reglement_clients.index')->with('success', 'Reglement client created successfully.');
    }

    public function edit($id)
    {
        $reglement_client = ReglementClient::findOrFail($id);
        $clients = Client::all();
        $mode_reglements = Mode_reglement::all();
        return view('reglement_clients.edit', compact('reglement_client', 'clients', 'mode_reglements'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'montant' => 'required|numeric',
            'mode_reglement_id' => 'required|exists:mode_reglements,id',
            'observation' => 'required|string',
            'client_id' => 'required|exists:clients,id',
        ]);

        $reglement_client = ReglementClient::findOrFail($id);
        $reglement_client->update($request->all());

        return redirect()->route('reglement_clients.index')->with('success', 'Reglement client updated successfully.');
    }

    public function destroy($id)
    {
        $reglement_client = ReglementClient::findOrFail($id);
        $reglement_client->delete();

        return redirect()->route('reglement_clients.index')->with('success', 'Reglement client deleted successfully.');
    }
}
