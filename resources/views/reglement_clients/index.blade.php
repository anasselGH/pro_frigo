<!-- resources/views/reglement_clients/index.blade.php -->
@extends('welcome')

@section('main')
<div class="container">
    <h2>List of Reglement Clients</h2>
    <a href="{{ route('reglement_clients.create') }}" class="btn btn-primary">Create Reglement Client</a>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Montant</th>
                <th>Mode Reglement</th>
                <th>Observation</th>
                <th>Client</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reglement_clients as $reglement_client)
                <tr>
                    <td>{{ $reglement_client->date }}</td>
                    <td>{{ $reglement_client->montant }}</td>
                    <td>{{ $reglement_client->modeReglement->mode_reglement }}</td>
                    <td>{{ $reglement_client->observation }}</td>
                    <td>{{ $reglement_client->client->nom }}</td>
                    <td>
                        <a href="{{ route('reglement_clients.edit', $reglement_client->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('reglement_clients.destroy', $reglement_client->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
