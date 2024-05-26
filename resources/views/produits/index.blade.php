@extends('welcome')

@section('main')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste des Produits</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('produits.create') }}"> Ajouter Produit</a>
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
            <th>Désignation</th>
            <th>Famille</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($produits as $produit)
        <tr>
            <td>{{ $produit->id }}</td>
            <td>{{ $produit->designation }}</td>
            <td>{{ $produit->famille->famille }}</td>
            <td>
                <form action="{{ route('produits.destroy',$produit->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('produits.edit',$produit->id) }}">Modifier</a>
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
