@extends('admin.layouts.app')

@section('title', 'Animals')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Animals</h2>
    <a href="{{ route('admin.animals.create') }}" class="btn btn-primary">Add Animal</a>
</div>

<form method="GET" class="row g-3 mb-4">
    <div class="col-md-3">
        <input type="text" name="name" value="{{ request('name') }}" class="form-control" placeholder="Search by Name">
    </div>
    <div class="col-md-3">
        <select name="animal_type_id" class="form-control">
            <option value="">All Types</option>
            @foreach($types as $type)
                <option value="{{ $type->id }}" @if(request('animal_type_id')==$type->id) selected @endif>{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <select name="breed_id" class="form-control">
            <option value="">All Breeds</option>
            @foreach($breeds as $breed)
                <option value="{{ $breed->id }}" @if(request('breed_id')==$breed->id) selected @endif>{{ $breed->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <input type="date" name="birth_date" value="{{ request('birth_date') }}" class="form-control">
    </div>
    <div class="col-md-1">
        <button class="btn btn-primary w-100">Filter</button>
    </div>
</form>


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
            <td>{{ \Carbon\Carbon::parse($animal->birth_date)->format('d M, Y') }}</td>
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

{{ $animals->withQueryString()->links() }}
@endsection
