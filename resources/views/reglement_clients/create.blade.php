<!-- resources/views/reglement_clients/create.blade.php -->
@extends('welcome')

@section('main')
<div class="container">
    <h2>Create Reglement Client</h2>
    <form action="{{ route('reglement_clients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" class="form-control">
        </div>
        <div class="form-group">
            <label for="montant">Montant:</label>
            <input type="number" name="montant" class="form-control">
        </div>
        <div class="form-group">
            <label for="mode_reglement_id">Mode Reglement:</label>
            <select name="mode_reglement_id" class="form-control">
                @foreach ($mode_reglements as $mode_reglement)
                    <option value="{{ $mode_reglement->id }}">{{ $mode_reglement->mode_reglement	 }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="observation">Observation:</label>
            <textarea name="observation" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="client_id">Client:</label>
            <select name="client_id" class="form-control">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
