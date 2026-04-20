@extends('layouts.app')

@section('title', 'Pet List')

@section('content')
    <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
        <h1>My Pets</h1>
        <div class="mb-3">
            <a href="/createpet" class="btn btn-primary">Create Pet</a>
        </div>
    </div>
    @if($pets->count() == 0)
        <p>No pets yet.</p>
    @else
        @foreach($pets as $pet)
            <div class="card mb-2 p-2">
                <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
                    <h3>{{ $pet->name }}</h3>
                    <div class="mb-3"><a href="/pets/{{ $pet->id }}/edit" class="btn btn-primary w-10">Edit Pet</a></div>
                </div>
                <div class="mb-2" style="display: flex; gap: 5px;">
                    <b>Species: </b> <span>{{ $pet->species }}</span>
                </div>
            </div>
        @endforeach
    @endif
@endsection