@extends('layouts.app')

@section('title', 'Pokedex')

@section('content')
    <div class="mt-4">
        <h1 class="text-center">Pokedex</h1>
        <div class="container">
            <div class="row">
                @foreach ($pokemons as $pokemon)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div>
                                <a href="{{ route('pokemon.show', $pokemon->id) }}">
                                   <img src="{{ $pokemon->photo ? Storage::url(ltrim($pokemon->photo, 'storage/')) : 'https://placehold.co/200' }}" width="200" height="auto"/>
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="card-text">ID: {{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</p>
                                <h5 class="card-title">
                                    <a href="{{ route('pokemon.show', $pokemon->id) }}">{{ $pokemon->name }}</a>
                                </h5>
                                <span class="badge bg-primary">{{ $pokemon->primary_type }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $pokemons->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
