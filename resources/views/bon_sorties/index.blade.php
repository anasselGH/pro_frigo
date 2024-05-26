<!-- resources/views/bon_sorties/index.blade.php -->

@extends('welcome')

@section('main')
    <div class="container">
        <h2>Bon Sorties</h2>
        <a href="{{ route('bon_sorties.create') }}" class="btn btn-primary">Add New Bon Sortie</a>

        @if($bon_sorties->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Vendeur</th>
                        <th>Observation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bon_sorties as $bon_sortie)
                        <tr>
                            <td>{{ $bon_sortie->date }}</td>
                            <td>{{ $bon_sortie->vendeur->nom }}</td>
                            <td>{{ $bon_sortie->observation }}</td>
                            <td>
                                <a href="{{ route('bon_sorties.showDetails', $bon_sortie->id) }}" class="btn btn-info">View Details</a>
                                <a href="{{ route('bon_sorties.edit', $bon_sortie->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('bon_sorties.destroy', $bon_sortie->id) }}" method="POST" style="display:inline-block;">
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
            <p>No Bon Sorties found.</p>
        @endif
    </div>
@endsection
