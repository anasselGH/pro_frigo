@extends('welcome')
@section("main")
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste des Vendeurs</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('vendeurs.create') }}"> Ajouter un Vendeur</a>
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
            <th>Nom</th>
            <th>Prénom</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($vendeurs as $vendeur)
        <tr>
            <td>{{ $vendeur->id}}</td>
            <td>{{ $vendeur->nom }}</td>
            <td>{{ $vendeur->prenom }}</td>
            <td>
                <form action="{{ route('vendeurs.destroy', $vendeur->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('vendeurs.edit', $vendeur->id) }}">Éditer</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $vendeurs->links() !!}
</div>
@endsection
