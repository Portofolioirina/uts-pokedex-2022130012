@extends('layouts.app')

@section('content')
<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>Update Existing Pokemon</h1>
</div>
<div class="row my-5">
    <div class="col-12 px-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('pokemon.update', $pokemon) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name' , $pokemon->name) }}" required>
        </div>

        <div class="form-group">
            <label for="species">Species</label>
            <input type="text" name="species" class="form-control" id="species" value="{{ old('species' , $pokemon->species) }}" required>
        </div>

        <div class="form-group">
            <label for="primary_type">Primary Type</label>
            <select name="primary_type" class="form-select" id="primary_type" value="{{ old('primary_type' , $pokemon->primary_type) }}" required>
                <option selected>Open this select menu</option>
                <option>Grass</option>
                <option>Fire</option>
                <option>Water</option>
                <option>Bug</option>
                <option>Normal</option>
                <option>Poison</option>
                <option>Electric</option>
                <option>Ground</option>
                <option>Fairy</option>
                <option>Fighting</option>
                <option>Psychic</option>
                <option>Rock</option>
                <option>Ghost</option>
                <option>Ice</option>
                <option>Dragon</option>
                <option>Dark</option>
                <option>Steel</option>
                <option>Flying</option>
            </select>
        </div>

        <div class="form-group">
            <label for="weight">Weight</label>
            <input type="number" name="weight"  Step=".01" class="form-control" id="weight" value="{{ old('weight', $pokemon->weight) }}" required>
        </div>

        <div class="form-group">
            <label for="height">Height</label>
            <input type="number" name="height"  Step=".01" class="form-control" id="height" value="{{ old('height', $pokemon->height) }}" required>
        </div>

        <div class="form-group">
            <label for="hp">HP</label>
            <input type="number" name="hp" class="form-control" id="hp" value="{{ old('hp', $pokemon->hp) }}" required>
        </div>

        <div class="form-group">
            <label for="attack">Attack</label>
            <input type="number" name="attack" class="form-control" id="attack" value="{{ old('attack', $pokemon->attack) }}" required>
        </div>

        <div class="form-group">
            <label for="defense">Defense</label>
            <input type="number" name="defense" class="form-control" id="defense" value="{{ old('defense', $pokemon->defense) }}" required>
        </div>

        <div class="form-check">
            <label for="is_legendary" class="form-check-label">Is Legendary?</label>
            <input type="checkbox" class="form-check-input" id="is_legendary" name="is_legendary" value="1" {{ old('is_legendary', $pokemon->is_legendary) ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" id="photo"  name="photo">
            @if ($pokemon->photo)
                <img src={{ $pokemon->photo_url }} class="mt-3" style="max-width: 400px; "/>

            @endif
        </div>

        <button type="submit" class="btn btn-primary btn-block">Save</button>
</div>
@endsection
