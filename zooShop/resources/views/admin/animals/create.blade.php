@extends('admin.layouts.app')

@section('title', 'Add Animal')

@section('content')
<h2>Add Animal</h2>

<form action="{{ route('admin.animals.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Type</label>
        <select name="animal_type_id" class="form-control" required>
            <option value="">Select Type</option>
            @foreach($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Breed</label>
        <select name="breed_id" class="form-control" required>
            <option value="">Select Breed</option>
            @foreach($breeds as $breed)
                <option value="{{ $breed->id }}">{{ $breed->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Birth Date</label>
        <input type="date" name="birth_date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-success">Save</button>
</form>
@endsection
