@extends('welcome')

@section('main')
<div class="container">
    <h2>Add Detail to Bon d'Entrée</h2>
    <form method="POST" action="{{ route('detail_bon_entres.store', $bon_entre_id) }}">
        @csrf

        <div class="form-group">
            <label for="produit_id">Produit:</label>
            <select id="produit_id" name="produit_id" class="form-control">
                @foreach($produits as $produit)
                    <option value="{{ $produit->id }}">{{ $produit->designation }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantite">Quantité:</label>
            <input type="number" id="quantite" name="quantite" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="prix">Prix:</label>
            <input type="number" id="prix" name="prix" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="conditionnement_id">Conditionnement:</label>
            <select id="conditionnement_id" name="conditionnement_id" class="form-control">
                @foreach($conditionnements as $conditionnement)
                    <option value="{{ $conditionnement->id }}">{{ $conditionnement->conditionnement }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Detail</button>
    </form>
</div>
@endsection
