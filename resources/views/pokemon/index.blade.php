@extends('layouts.template')

@section('title', 'Products List')

@section('body')
<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>All Pokemon</h1>

    <a href="{{ route('pokemon.create') }}" class="btn btn-primary btn-sm">Create New Pokemon</a>
</div>

<div class="container mt-5">
    <table class="table table-bordered mb-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Species</th>
                <th scope="col">Primary Type</th>
                <th scope="col">Power</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    </table>
</div>
