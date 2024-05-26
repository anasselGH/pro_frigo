@extends('welcome')

@section('main')
<div class="container">
    <h2>Edit Detail of Bon d'Entrée</h2>
    <form method="POST" action="{{ route('detail_bon_entres.update', $detail_bon_entres->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="produit_id">Produit:</label>
            <select id="produit_id" name="produit_id" class="form-control">
                @foreach($produits as $produit)
                    <option value="{{ $produit->id }}" {{ $detail_bon_entres->produit_id == $produit->id ? 'selected' : '' }}>
                        {{ $produit->designation }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantite">Quantité:</label>
            <input type="number" id="quantite" name="quantite" class="form-control" value="{{ $detail_bon_entres->quantite }}" required>
        </div>

        <div class="form-group">
            <label for="prix">Prix:</label>
            <input type="number" id="prix" name="prix" class="form-control" value="{{ $detail_bon_entres->prix }}" required>
        </div>

        <div class="form-group">
            <label for="conditionnement_id">Conditionnement:</label>
            <select id="conditionnement_id" name="conditionnement_id" class="form-control">
                @foreach($conditionnements as $conditionnement)
                    <option value="{{ $conditionnement->id }}" {{ $detail_bon_entres->conditionnement_id == $conditionnement->id ? 'selected' : '' }}>
                        {{ $conditionnement->conditionnement }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Detail</button>
    </form>
</div>
@endsection
