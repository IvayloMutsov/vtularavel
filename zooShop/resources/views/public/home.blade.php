@extends('public.layouts.app')

@section('title', 'Home')

@section('content')
<h2 class="mb-4">Latest Animals</h2>

<div class="row">
    @foreach($latestAnimals as $animal)
    <div class="col-md-3 mb-4">
        <div class="card">
            @if($animal->image)
                <img src="{{ asset('storage/' . $animal->image) }}" class="card-img-top" style="height:150px; object-fit:cover;">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $animal->name }}</h5>
                <p class="card-text">
                    {{ $animal->breed->name }} - {{ $animal->animalType->name }}<br>
                    Born: {{ $animal->birth_date }}
                </p>
                <a href="{{ route('animals.show', $animal) }}" class="btn btn-sm btn-primary">View</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
