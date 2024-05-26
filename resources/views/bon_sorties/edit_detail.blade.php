<!-- resources/views/bon_sorties/edit_detail.blade.php -->
@extends('welcome')

@section('main')
    <div class="container">
        <h2>Edit Detail of Bon Sortie</h2>
        <!-- Form for editing detail -->
        <form action="{{ route('bon_sorties.updateDetail', $detail_bon_sortie->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Edit input fields for detail -->
            <div class="form-group">
                <label for="produit_id">Produit:</label>
                <select name="produit_id" class="form-control">
                    <!-- Option values for produits -->
                    @foreach ($produits as $produit)
                        <option value="{{ $produit->id }}" {{ $produit->id == $detail_bon_sortie->produit_id ? 'selected' : '' }}>
                            {{ $produit->designation }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantite">Quantité:</label>
                <input type="number" name="quantite" class="form-control" value="{{ $detail_bon_sortie->quantite }}">
            </div>
            <div class="form-group">
                <label for="conditionnement_id">Conditionnement:</label>
                <select name="conditionnement_id" class="form-control">
                    <!-- Option values for conditionnements -->
                    @foreach ($conditionnements as $conditionnement)
                        <option value="{{ $conditionnement->id }}" {{ $conditionnement->id == $detail_bon_sortie->conditionnement_id ? 'selected' : '' }}>
                            {{ $conditionnement->conditionnement }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Add more input fields for other detail properties -->
            <button type="submit" class="btn btn-primary">Update Detail</button>
        </form>
    </div>
@endsection
