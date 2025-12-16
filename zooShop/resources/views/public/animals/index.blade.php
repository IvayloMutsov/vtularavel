@extends('public.layouts.app')

@section('title', 'Animals')

@section('content')
<h2 class="mb-4">Animals</h2>

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

<div class="row">
    @foreach($animals as $animal)
    <div class="col-md-3 mb-4">
        <div class="card">
            @if($animal->image)
                <img src="{{ asset('storage/' . $animal->image) }}" class="card-img-top" style="height:150px; object-fit:cover;">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $animal->name }}</h5>
                <p class="card-text">{{ $animal->breed->name }} - {{ $animal->animalType->name }}</p>
                <a href="{{ route('animals.show', $animal) }}" class="btn btn-sm btn-primary">View</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{ $animals->withQueryString()->links() }}
@endsection
