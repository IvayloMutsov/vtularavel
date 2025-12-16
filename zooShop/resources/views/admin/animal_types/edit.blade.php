@extends('admin.layouts.app')

@section('title', 'Add/Edit Animal Type')

@section('content')
<h2>@yield('title')</h2>

<form action="{{ isset($animalType) ? route('admin.animal-types.update', $animalType->id) : route('admin.animal-types.store') }}" method="POST">
    @csrf
    @if(isset($animalType))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $animalType->name ?? old('name') }}" required>
    </div>

    <button class="btn btn-success">Save</button>
</form>
@endsection
