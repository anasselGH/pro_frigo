@extends('welcome')
@section("main")
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste des Familles</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('familles.create') }}"> Ajouter une Famille</a>
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
            <th>Nom de la Famille</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($familles as $famille)
        <tr>
            <td>{{ $famille->id }}</td>
            <td>{{ $famille->famille }}</td>
            <td>
                <form action="{{ route('familles.destroy', $famille->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('familles.show', $famille->id) }}">Voir</a>
                    <a class="btn btn-primary" href="{{ route('familles.edit', $famille->id) }}">Éditer</a>

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
