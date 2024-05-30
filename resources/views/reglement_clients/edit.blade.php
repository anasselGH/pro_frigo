<!-- resources/views/reglement_clients/edit.blade.php -->
@extends('welcome')

@section('main')
<div class="container">
    <h2>Edit Reglement Client</h2>
    <form action="{{ route('reglement_clients.update', $reglement_client->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" class="form-control" value="{{ $reglement_client->date }}">
        </div>
        <div class="form-group">
            <label for="montant">Montant:</label>
            <input type="text" name="montant" class="form-control" value="{{ $reglement_client->montant }}">
        </div>
        <div class="form-group">
            <label for="mode_reglement_id">Mode Reglement:</label>
            <select name="mode_reglement_id" class="form-control">
                @foreach ($mode_reglements as $mode_reglement)
                    <option value="{{ $mode_reglement->id }}" {{ $reglement_client->mode_reglement_id == $mode_reglement->id ? 'selected' : '' }}>
                        {{ $mode_reglement->mode_reglement	 }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="observation">Observation:</label>
            <textarea name="observation" class="form-control">{{ $reglement_client->observation }}</textarea>
        </div>
        <div class="form-group">
            <label for="client_id">Client:</label>
            <select name="client_id" class="form-control">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $reglement_client->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->nom }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
