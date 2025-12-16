@extends('admin.layouts.app')

@section('title', 'Breeds')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Breeds</h2>
    <a href="{{ route('admin.breeds.create') }}" class="btn btn-primary">Add Breed</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Animal Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($breeds as $breed)
        <tr>
            <td>{{ $breed->name }}</td>
            <td>{{ $breed->animalType->name }}</td>
            <td>
                <a href="{{ route('admin.breeds.edit', $breed) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.breeds.destroy', $breed) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $breeds->links() }}
@endsection
