@extends('admin.layouts.app')

@section('title', 'Animals')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Animals</h2>
    <a href="{{ route('admin.animals.create') }}" class="btn btn-primary">Add Animal</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Breed</th>
            <th>Type</th>
            <th>Birth Date</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($animals as $animal)
        <tr>
            <td>{{ $animal->name }}</td>
            <td>{{ $animal->breed->name }}</td>
            <td>{{ $animal->animalType->name }}</td>
            <td>{{ $animal->birth_date }}</td>
            <td>
                @if($animal->image)
                    <img src="{{ asset('storage/' . $animal->image) }}" width="50">
                @endif
            </td>
            <td>
                <a href="{{ route('admin.animals.edit', $animal) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.animals.destroy', $animal) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $animals->links() }}
@endsection
