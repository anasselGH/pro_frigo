@extends('welcome')

@section('main')
    <div class="container">
        <h2>Edit Bon de Livraison</h2>
        <form action="{{ route('bon_livraisons.update', $bon_livraison->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" class="form-control" value="{{ $bon_livraison->date }}">
            </div>
            <div class="form-group">
                <label for="client_id">Client:</label>
                <select name="client_id" class="form-control">
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}" {{ $client->id == $bon_livraison->client_id ? 'selected' : '' }}>
                            {{ $client->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="vendeur_id">Vendeur:</label>
                <select name="vendeur_id" class="form-control">
                    @foreach ($vendeurs as $vendeur)
                        <option value="{{ $vendeur->id }}" {{ $vendeur->id == $bon_livraison->vendeur_id ? 'selected' : '' }}>
                            {{ $vendeur->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="observation">Observation:</label>
                <textarea name="observation" class="form-control">{{ $bon_livraison->observation }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Bon de Livraison</button>
        </form>
    </div>
@endsection
