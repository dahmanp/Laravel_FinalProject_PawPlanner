@extends('layouts.app')

@section('title', 'Pet Page')

@section('content')
    <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
        <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
            <img src="{{ asset('storage/' . $pet->icon) }}" width="100" height="100" style="object-fit: cover; border-radius:50%; background-color: #F2F2F2"><h1 style="color: #4B3D3D; font-family: 'Bold', sans-serif;">{{ $pet->name }}</h1>
        </div>
        <div class="mb-3">
            <a href="/pets" class="btn btn-outline-primary w-10" style="color: #4B3D3D; font-family: 'Regular', sans-serif;">All Pets</a>
            <a href="/pets/{{ $pet->id }}/edit" class="btn btn-primary w-10" style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Edit Pet</a>
            @if(Auth()->user()->id == $pet->primaryOwner)
                <a href="/share/{{ $pet->id }}" class="btn btn-primary w-10" style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Share Pet</a>
            @endif
        </div>
    </div>
    <div class="card mb-2 py-4 px-4 pt-4 pb-2 border-0 d-flex justify-content-center" style="background-color: #D4BFBB; width: fit-content">
        <div class="d-flex justify-content-center" style="gap: 7px;">
            <div class="card mb-3 pl-2 pr-2 p-2 border-0 d-flex justify-content-center" style="background-color: rgba(255, 255, 255, 0.25); width: 250px;">
                <div style="display: flex; gap: 5px;">
                    <b style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Species: </b> <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $pet->species }}</span>
                </div>
            </div>
            <div class="card mb-3 pl-2 pr-2 p-2 border-0 d-flex justify-content-center" style="background-color: rgba(255, 255, 255, 0.25); width: 250px;">
                <div style="display: flex; gap: 5px;">
                    <b style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Age: </b> <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $pet->age }}</span>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center" style="gap: 7px;">
            <div class="card mb-3 pl-2 pr-2 p-2 border-0 d-flex justify-content-center" style="background-color: rgba(255, 255, 255, 0.25); width: 250px;">
                <div style="display: flex; gap: 5px;">
                    <b style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Birthday: </b> <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $pet->birthday }}</span>
                </div>
            </div>
            <div class="card mb-3 pl-2 pr-2 p-2 border-0 d-flex justify-content-center" style="background-color: rgba(255, 255, 255, 0.25); width: 250px;">
                <div style="display: flex; gap: 5px;">
                    <b style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Sex: </b> <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $pet->sex }}</span>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center" style="gap: 7px;">
            <div class="card mb-3 pl-2 pr-2 p-2 border-0 d-flex justify-content-center" style="background-color: rgba(255, 255, 255, 0.25); width: 250px;">
                <div style="display: flex; gap: 5px;">
                    <b style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Weight: </b> <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $pet->weight }} pounds</span>
                </div>
            </div>
            <div class="card mb-3 pl-2 pr-2 p-2 border-0 d-flex justify-content-center" style="background-color: rgba(255, 255, 255, 0.25); width: 250px;">
                <div style="display: flex; gap: 5px;">
                    <b style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Height: </b> <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $pet->height }} inches</span>
                </div>
            </div>
        </div>
        <div class="card mb-3 pl-2 pr-2 p-2 border-0 d-flex justify-content-center" style="background-color: rgba(255, 255, 255, 0.25); width: 500px;">
            <div style="display: flex; gap: 5px;">
                <b style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Allergies: </b> <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $pet->allergies }}</span>
            </div>
        </div>
        <div class="card mb-3 pl-2 pr-2 p-2 border-0 d-flex justify-content-center" style="background-color: rgba(255, 255, 255, 0.25); width: 500px;">
            <div style="display: flex; gap: 5px;">
                <b style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Medical Conditions: </b> <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $pet->medicalConditions }}</span>
            </div>
        </div>
    </div>

    @if(Auth()->user()->id == $pet->primaryOwner)
        <form method="POST" action="{{ route('pets.destroy', $pet->id) }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Delete Pet</button>
        </form>
    @endif
    @if(Auth()->user()->id != $pet->primaryOwner)
        <form method="POST" action="{{ route('pets.remove', $pet->id) }}">
            @csrf
            @method('POST')
            <button class="btn btn-danger" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Remove Pet</button>
        </form>
    @endif
@endsection