@extends('welcome')
@section("main")
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ajouter une Famille</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-primary" href="{{ route('familles.index') }}"> Retour</a>
            </div>
        </div>
    </div>



    <form action="{{ route('familles.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom de la Famille:</strong>
                    <input type="text" name="famille" class="form-control" placeholder="Nom de la Famille">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>

    </form>
</div>
@endsection
