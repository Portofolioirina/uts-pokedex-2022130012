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
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->species }}</td>
                <td>{{ $item->primary_type }}</td>
                <td>{{ $item->hp + $item->attack + $item->defense }}</td>
                <td>
                    <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
