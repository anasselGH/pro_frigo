@extends('welcome')

@section('main')
    <div class="container">
        <h2>Add Detail to Bon Livraison</h2>
        <form action="{{ route('bon_livraisons.addDetail', $bon_livraison->id) }}" method="POST">
            @csrf
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
                <input type="number" name="quantite" class="form-control">
            </div>
            <div class="form-group">
                <label for="prix_vente">Prix Vente:</label>
                <input type="number" name="prix_vente" class="form-control">
            </div>
            <div class="form-group">
                <label for="conditionnement_id">Conditionnement:</label>
                <select name="conditionnement_id" class="form-control">
                    @foreach ($conditionnements as $conditionnement)
                        <option value="{{ $conditionnement->id }}">{{ $conditionnement->conditionnement }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Detail</button>
        </form>
    </div>
@endsection
