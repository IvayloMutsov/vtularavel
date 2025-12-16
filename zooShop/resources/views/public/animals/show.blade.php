@extends('public.layouts.app')

@section('title', $animal->name)

@section('content')
<div class="card mb-4">
    @if($animal->image)
        <img src="{{ asset('storage/' . $animal->image) }}" class="card-img-top" style="height:300px; object-fit:cover;">
    @endif
    <div class="card-body">
        <h2>{{ $animal->name }}</h2>
        <p><strong>Type:</strong> {{ $animal->animalType->name }}</p>
        <p><strong>Breed:</strong> {{ $animal->breed->name }}</p>
        <p><strong>Birth Date:</strong> {{ $animal->birth_date }}</p>
    </div>
</div>

<a href="{{ route('animals.list') }}" class="btn btn-secondary">Back to Animals</a>
@endsection
