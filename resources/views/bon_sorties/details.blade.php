<!-- resources/views/bon_sorties/details.blade.php -->
@extends('welcome')

@section('main')
    <div class="container">
        <h2>Details of Bon Sortie</h2>

        <!-- Add Detail button -->
        <a href="{{ route('bon_sorties.showAddDetailForm', $bon_sortie->id) }}" class="btn btn-success">Add Detail</a>

        @if ($detail_bon_sorties->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Conditionnement</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_bon_sorties as $detail)
                        <tr>
                            <td>{{ $detail->produit->designation }}</td>
                            <td>{{ $detail->quantite }}</td>
                            <td>{{ $detail->conditionnement->conditionnement }}</td>
                            <td>
                                <!-- Edit button -->
                                <a href="{{ route('bon_sorties.editDetail', $detail->id) }}" class="btn btn-warning">Edit</a>
                                <!-- Delete form -->
                                <form action="{{ route('bon_sorties.deleteDetail', ['id' => $bon_sortie->id, 'detail' => $detail->id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No details found for this bon.</p>
        @endif
    </div>
@endsection
