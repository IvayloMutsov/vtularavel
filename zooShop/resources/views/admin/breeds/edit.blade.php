@extends('admin.layouts.app')

@section('title', 'Add/Edit Breed')

@section('content')
<h2>@yield('title')</h2>

<form action="{{ isset($breed) ? route('admin.breeds.update', $breed) : route('admin.breeds.store') }}" method="POST">
    @csrf
    @if(isset($breed))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $breed->name ?? '' }}" required>
    </div>

    <div class="mb-3">
        <label>Animal Type</label>
        <select name="animal_type_id" class="form-control" required>
            <option value="">Select Type</option>
            @foreach($types as $type)
                <option value="{{ $type->id }}" @if(isset($breed) && $breed->animal_type_id==$type->id) selected @endif>{{ $type->name }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Save</button>
</form>
@endsection
