@extends('welcome')

@section('main')
    <div class="container">
        <h2>Details of Bon de Livraison</h2>
        <a href="{{ route('bon_livraisons.showAddDetailForm', $bon_livraison->id) }}" class="btn btn-success">Add Detail</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix Vente</th>
                    <th>Conditionnement</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_bon_livraisons as $detail)
                    <tr>
                        <td>{{ $detail->produit->designation }}</td>
                        <td>{{ $detail->quantite }}</td>
                        <td>{{ $detail->prix_vente }}</td>
                        <td>{{ $detail->conditionnement->conditionnement }}</td>
                        <td>
                            <a href="{{ route('bon_livraisons.editDetail', $detail->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('bon_livraisons.deleteDetail', ['id' => $bon_livraison->id, 'detail' => $detail->id]) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
