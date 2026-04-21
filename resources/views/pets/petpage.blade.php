@extends('layouts.app')

@section('title', 'Pet Page')

@section('content')
    <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
        <h1>{{ $pet->name }}</h1>
        <div class="mb-3">
            <a href="/pets" class="btn btn-outline-primary w-10">All Pets</a>
            <a href="/pets/{{ $pet->id }}/edit" class="btn btn-primary w-10">Edit Pet</a>
            @if(Auth()->user()->id == $pet->primaryOwner)
                <a href="/share/{{ $pet->id }}" class="btn btn-primary w-10">Share Pet</a>
            @endif
        </div>
    </div>
    <img src="{{ asset('storage/' . $pet->icon) }}" width="100" height="100" style="object-fit: cover; border-radius:50%; background-color: #F2F2F2">

    <div class="card mb-2 p-2">
        <li class="list-group-item justify-content-between align-items-center">
            <div style="display: flex; gap: 5px;">
                <b>Species: </b> <span>{{ $pet->species }}</span>
            </div>
            <div style="display: flex; gap: 5px;">
                <b>Age: </b> <span>{{ $pet->age }}</span>
            </div>
            <div style="display: flex; gap: 5px;">
                <b>Birthday: </b> <span>{{ $pet->birthday }}</span>
            </div>
            <div style="display: flex; gap: 5px;">
                <b>Sex: </b> <span>{{ $pet->sex }}</span>
            </div>
            <div style="display: flex; gap: 5px;">
                <b>Weight: </b> <span>{{ $pet->weight }}</span>
            </div>
            <div style="display: flex; gap: 5px;">
                <b>Height: </b> <span>{{ $pet->height }}</span>
            </div>
            <div style="display: flex; gap: 5px;">
                <b>Allergies: </b> <span>{{ $pet->allergies }}</span>
            </div>
            <div style="display: flex; gap: 5px;">
                <b>Medical Conditions: </b> <span>{{ $pet->medicalConditions }}</span>
            </div>
        </li>
    </div>

    @if(Auth()->user()->id == $pet->primaryOwner)
        <form method="POST" action="{{ route('pets.destroy', $pet->id) }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete Pet</button>
        </form>
    @endif
    @if(Auth()->user()->id != $pet->primaryOwner)
        <form method="POST" action="{{ route('pets.remove', $pet->id) }}">
            @csrf
            @method('POST')
            <button class="btn btn-danger">Remove Pet</button>
        </form>
    @endif
@endsection