@extends('welcome')
@section('main')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ajouter un Client</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-primary" href="{{ route('clients.index') }}"> Retour</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger ">
        <strong>Oups!</strong> Il y a eu quelques problèmes avec votre entrée.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf

        <div class="row form">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" >
                    <strong>Nom:</strong>
                    <input type="text" name="nom"class="form-control"  placeholder="Nom">
                </div>
                <div class="form-group">
                    <strong>Prénom:</strong>
                    <input type="text" name="prenom" class="form-control" placeholder="Prénom">
                </div>
                <div class="form-group">
                    <strong>Vendeur:</strong>
                    <select name="vendeur_id" class="form-control">
                        <option value="">Sélectionnez un vendeur</option>
                        @foreach ($vendeurs as $vendeur)
                            <option value="{{ $vendeur->id }}">{{ $vendeur->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </form>
</div>
@endsection
