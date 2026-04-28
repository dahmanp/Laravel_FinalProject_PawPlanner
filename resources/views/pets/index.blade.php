@extends('layouts.app')

@section('title', 'Pet List')

@section('content')
    <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
        <h1 style="color: #4B3D3D; font-family: 'Bold', sans-serif;">My Pets</h1>
        <div class="mb-3">
            <a href="/createpet" class="btn" style="background-color: #D4BFBB; color: #4B3D3D; font-family: 'Regular', sans-serif;">Create Pet</a>
        </div>
    </div>
    @if($pets->count() == 0)
        <p>No pets yet.</p>
    @else
        <div class="flex-wrap d-flex align-items-center justify-content-center" style="gap: 15px">
            @foreach($pets as $pet)
            <div class="card mb-2 py-4 px-4 pt-4 pb-2 border-0 d-flex justify-content-center" style="background-color: #D4BFBB; min-width: 500px; cursor: pointer;" onclick="window.location='/petpage/{{ $pet->id }}'">
                <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
                    <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 8px;">
                        <img src="{{ asset('storage/' . $pet->icon) }}" width="100" height="100" style="object-fit: cover; border-radius:50%; background-color: #F2F2F2"><h1 style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $pet->name }}</h1>
                    </div>
                    <div class="mb-3">
                        <a href="/pets/{{ $pet->id }}/edit" onclick="event.stopPropagation()" class="btn" style="background-color: #F9EAE6; border-color: #98FB98; border-width: 3px; color: #4B3D3D; font-family: 'Regular', sans-serif;">Edit Pet</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    @endif
@endsection