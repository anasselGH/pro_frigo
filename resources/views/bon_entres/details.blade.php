<!-- resources/views/bon_entres/details.blade.php -->
@extends('welcome')

@section('main')
    <div class="container">
        <h2>Details of Bon d'Entrée</h2>

        <a href="{{ route('detail_bon_entres.create', $bon_entre->id) }}" class="btn btn-success">Add Detail</a>

        @if ($detail_bon_entres->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Conditionnement</th>
                        <th>Actions</th>
                        <!-- Add more table headers as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_bon_entres as $detail)
                        <tr>
                            <td>{{ $detail->produit->designation }}</td>
                            <td>{{ $detail->quantite }}</td>
                            <td>{{ $detail->prix }}</td>
                            <td>{{ $detail->conditionnement->conditionnement }}</td>
                            <td>
                                <a href="{{ route('detail_bon_entres.edit', $detail->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('detail_bon_entres.destroy', $detail->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            <!-- Add more table data as needed -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No details found for this bon.</p>
        @endif
    </div>
@endsection
