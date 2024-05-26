@extends('welcome')

@section('main')
    <div class="container">
        <h2>Bon de Livraisons</h2>
        <a href="{{ route('bon_livraisons.create') }}" class="btn btn-success">Create Bon Livraison</a>
        @if ($bon_livraisons->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Client</th>
                        <th>Vendeur</th>
                        <th>Observation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bon_livraisons as $bon_livraison)
                        <tr>
                            <td>{{ $bon_livraison->date }}</td>
                            <td>{{ $bon_livraison->client->nom }}</td>
                            <td>{{ $bon_livraison->vendeur->nom }}</td>
                            <td>{{ $bon_livraison->observation }}</td>
                            <td>
                                <a href="{{ route('bon_livraisons.showDetails', $bon_livraison->id) }}" class="btn btn-info">Details</a>
                                <a href="{{ route('bon_livraisons.edit', $bon_livraison->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('bon_livraisons.destroy', $bon_livraison->id) }}" method="POST" style="display:inline-block;">
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
            <p>No bon de livraisons available.</p>
        @endif
    </div>
@endsection
