@extends('admin.layouts.app')

@section('title', 'Add/Edit Animal Type')

@section('content')
<h2>@yield('title')</h2>

<form action="{{ isset($type) ? route('admin.animal-types.update', $type) : route('admin.animal-types.store') }}" method="POST">
    @csrf
    @if(isset($type))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $type->name ?? '' }}" required>
    </div>

    <button class="btn btn-success">Save</button>
</form>
@endsection
