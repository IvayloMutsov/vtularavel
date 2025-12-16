@extends('admin.layouts.app')

@section('title', 'Animal Types')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Animal Types</h2>
    <a href="{{ route('admin.animal-types.create') }}" class="btn btn-primary">Add Type</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($types as $type)
        <tr>
            <td>{{ $type->name }}</td>
            <td>
                <a href="{{ route('admin.animal-types.edit', $type) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.animal-types.destroy', $type) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $types->links() }}
@endsection
