@extends('admin.layouts.app')

@section('title', 'Edit Animal')

@section('content')
<h2>Edit Animal</h2>

<form action="{{ route('admin.animals.update', $animal) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $animal->name }}" required>
    </div>

    <div class="mb-3">
        <label>Type</label>
        <select name="animal_type_id" class="form-control" required>
            @foreach($types as $type)
                <option value="{{ $type->id }}" @if($animal->animal_type_id==$type->id) selected @endif>{{ $type->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Breed</label>
        <select name="breed_id" class="form-control" required>
            @foreach($breeds as $breed)
                <option value="{{ $breed->id }}" @if($animal->breed_id==$breed->id) selected @endif>{{ $breed->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Birth Date</label>
        <input type="date" name="birth_date" class="form-control" value="{{ $animal->birth_date }}" required>
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
        @if($animal->image)
            <img src="{{ asset('storage/' . $animal->image) }}" width="100" class="mt-2">
        @endif
    </div>

    <button class="btn btn-success">Update</button>
</form>
@endsection
