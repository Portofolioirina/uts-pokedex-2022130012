@extends('layouts.app')

@section('title', "Pokemon: $pokemon->name")

@section('content')
<div class="container mt-5">
    @if ($pokemon->photo)
    <img src="{{ $pokemon->photo ? Storage::url($pokemon->photo) : 'https://placehold.co/200' }}" class="card-img-top" alt="{{ $pokemon->name }}">
    @endif

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">Name</th>
                <td>{{ $pokemon->name }}</td>
            </tr>
            <tr>
                <th scope="row">Species</th>
                <td>{{ $pokemon->species }}</td>
            </tr>
            <tr>
                <th scope="row">Primary Type</th>
                <td>{{ $pokemon->primary_type }}</td>
            </tr>
            <tr>
                <th scope="row">Weight</th>
                <td>{{ $pokemon->weight }}</td>
            </tr>
            <tr>
                <th scope="row">Height</th>
                <td>{{ $pokemon->height }}</td>
            </tr>
            <tr>
                <th scope="row">HP</th>
                <td>{{ $pokemon->hp }}</td>
            </tr>
            <tr>
                <th scope="row">Attack</th>
                <td>{{ $pokemon->attack }}</td>
            </tr>
            <tr>
                <th scope="row">Defense</th>
                <td>{{ $pokemon->defense }}</td>
            </tr>
            <tr>
                <th scope="row">Is Legendary</th>
                <td>{{ $pokemon->is_legendary ? 'Yes' : 'No' }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

