@extends('welcome')

@section('main')
    <div class="container">
        <h2>Edit Detail of Bon Livraison</h2>
        <!-- Form for editing detail -->
        <form action="{{ route('bon_livraisons.updateDetail', $detail_bon_livraison->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Edit input fields for detail -->
            <div class="form-group">
                <label for="produit_id">Produit:</label>
                <select name="produit_id" class="form-control">
                    <!-- Option values for produits -->
                    @foreach ($produits as $produit)
                        <option value="{{ $produit->id }}" {{ $produit->id == $detail_bon_livraison->produit_id ? 'selected' : '' }}>
                            {{ $produit->designation }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantite">Quantité:</label>
                <input type="number" name="quantite" class="form-control" value="{{ $detail_bon_livraison->quantite }}">
            </div>
            <div class="form-group">
                <label for="prix_vente">Prix Vente:</label>
                <input type="number" name="prix_vente" class="form-control" value="{{ $detail_bon_livraison->prix_vente }}">
            </div>
            <div class="form-group">
                <label for="conditionnement_id">Conditionnement:</label>
                <select name="conditionnement_id" class="form-control">
                    <!-- Option values for conditionnements -->
                    @foreach ($conditionnements as $conditionnement)
                        <option value="{{ $conditionnement->id }}" {{ $conditionnement->id == $detail_bon_livraison->conditionnement_id ? 'selected' : '' }}>
                            {{ $conditionnement->conditionnement }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Add more input fields for other detail properties if necessary -->
            <button type="submit" class="btn btn-primary">Update Detail</button>
        </form>
    </div>
@endsection
