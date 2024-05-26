<!-- resources/views/bon_sorties/create.blade.php -->

@extends('welcome')

@section('main')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ajouter Bon de Sortie</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-primary" href="{{ route('bon_sorties.index') }}">Retour</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Oups!</strong> Il y a eu quelques problèmes avec votre entrée.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('bon_sorties.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="date" class="form-control" placeholder="Date">
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
                <div class="form-group">
                    <strong>Observation:</strong>
                    <textarea name="observation" class="form-control" placeholder="Observation"></textarea>
                </div>
                <div class="form-group">
                    <strong>Détails:</strong>
                    <table class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Conditionnement</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>
                                <select name="details[0][produit_id]" class="form-control">
                                    <option value="">Sélectionnez un produit</option>
                                    @foreach ($produits as $produit)
                                        <option value="{{ $produit->id }}">{{ $produit->designation }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="number" name="details[0][quantite]" class="form-control" /></td>
                            <td>
                                <select name="details[0][conditionnement_id]" class="form-control">
                                    <option value="">Sélectionnez un conditionnement</option>
                                    @foreach ($conditionnements as $conditionnement)
                                        <option value="{{ $conditionnement->id }}">{{ $conditionnement->conditionnement }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Ajouter</button></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><select name="details[' + i +
            '][produit_id]" class="form-control"><option value="">Sélectionnez un produit</option>@foreach ($produits as $produit)<option value="{{ $produit->id }}">{{ $produit->designation }}</option>@endforeach</select></td><td><input type="number" name="details[' + i +
            '][quantite]" class="form-control" /></td><td><select name="details[' + i +
            '][conditionnement_id]" class="form-control"><option value="">Sélectionnez un conditionnement</option>@foreach ($conditionnements as $conditionnement)<option value="{{ $conditionnement->id }}">{{ $conditionnement->nom }}</option>@endforeach</select></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Supprimer</button></td></tr>');
    });

    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
@endsection
