@extends('welcome')

@section('main')
    <div class="container">
        <h2>Create Bon de Livraison</h2>
        <form action="{{ route('bon_livraisons.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="client_id">Client:</label>
                <select name="client_id" class="form-control">
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="vendeur_id">Vendeur:</label>
                <select name="vendeur_id" class="form-control">
                    @foreach ($vendeurs as $vendeur)
                        <option value="{{ $vendeur->id }}">{{ $vendeur->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="observation">Observation:</label>
                <textarea name="observation" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Bon de Livraison</button>
        </form>
    </div>
@endsection
