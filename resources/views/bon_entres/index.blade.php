@extends('welcome')

@section('main')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste des Bons d'Entrée</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('bon_entres.create') }}"> Ajouter Bon d'Entrée</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>Vendeur</th>
            <th>Date Entrée</th>
            <th>Date Sortie</th>
            <th>Observation</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($bon_entres as $bon_entre)
        <tr>
            <td>{{ $bon_entre->id }}</td>
            <td>{{ $bon_entre->date }}</td>
            <td>{{ $bon_entre->vendeur->nom }}</td>
            <td>{{ $bon_entre->date_entre }}</td>
            <td>{{ $bon_entre->date_sortie }}</td>
            <td>{{ $bon_entre->observation }}</td>
            <td>
                <form action="{{ route('bon_entres.destroy',$bon_entre->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('bon_entres.edit',$bon_entre->id) }}">Modifier</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
            <a href="{{ route('bon_entres.details', ['id' => $bon_entre->id]) }}" class="btn btn-primary">View Details</a>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
