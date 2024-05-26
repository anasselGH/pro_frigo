@extends('welcome')

@section('main')
    <div class="container">
        <h2>Edit Bon d'Entrée</h2>
        <form method="POST" action="{{ route('bon_entres.update', $bon_entre->id) }}">
            @csrf
            @method('PUT')

            <!-- Date -->
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" class="form-control" value="{{ $bon_entre->date }}">
            </div>

            <!-- Vendeur -->
            <div class="form-group">
                <label for="vendeur_id">Vendeur:</label>
                <select id="vendeur_id" name="vendeur_id" class="form-control">
                    @foreach($vendeurs as $vendeur)
                        <option value="{{ $vendeur->id }}" {{ $bon_entre->vendeur_id == $vendeur->id ? 'selected' : '' }}>
                            {{ $vendeur->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Date Entrée -->
            <div class="form-group">
                <label for="date_entre">Date Entrée:</label>
                <input type="date" id="date_entre" name="date_entre" class="form-control" value="{{ $bon_entre->date_entre }}">
            </div>

            <!-- Date Sortie -->
            <div class="form-group">
                <label for="date_sortie">Date Sortie:</label>
                <input type="date" id="date_sortie" name="date_sortie" class="form-control" value="{{ $bon_entre->date_sortie }}">
            </div>

            <!-- Observation -->
            <div class="form-group">
                <label for="observation">Observation:</label>
                <textarea id="observation" name="observation" class="form-control">{{ $bon_entre->observation }}</textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
