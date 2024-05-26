@extends('welcome')

@section('main')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste des Clients</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('clients.create') }}"> Ajouter un Client</a>
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
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Vendeur ID</th>
            <th>Actions</th>
        </tr>
        @foreach ($clients as $client)
        <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->nom }}</td>
            <td>{{ $client->prenom }}</td>
            <td>{{ $client->vendeur_id }}</td>
            <td>
                <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('clients.edit', $client->id) }}">Modifier</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
