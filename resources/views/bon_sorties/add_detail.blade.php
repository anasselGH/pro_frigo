<!-- resources/views/bon_sorties/add_detail.blade.php -->
@extends('welcome')

@section('main')
    <div class="container">
        <h2>Add Detail to Bon Sortie</h2>
        <!-- Form for adding detail -->
        <form action="{{ route('bon_sorties.addDetail', $bon_sortie->id) }}" method="POST">
            @csrf
            <!-- Add input fields for detail -->
            <div class="form-group">
                <label for="produit_id">Produit:</label>
                <select name="produit_id" class="form-control">
                    @foreach ($produits as $produit)
                        <option value="{{ $produit->id }}">{{ $produit->designation }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantite">Quantité:</label>
                <input type="number" name="quantite" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="conditionnement_id">Conditionnement:</label>
                <select name="conditionnement_id" class="form-control">
                    @foreach ($conditionnements as $conditionnement)
                        <option value="{{ $conditionnement->id }}">{{ $conditionnement->conditionnement }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Add more input fields for other detail properties -->
            <button type="submit" class="btn btn-primary">Add Detail</button>
        </form>
    </div>
@endsection
