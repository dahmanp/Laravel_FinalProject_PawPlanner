@extends('layouts.app')

@section('title', 'My Network')

@section('content')
    <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
        <h1 style="color: #4B3D3D; font-family: 'Bold', sans-serif;">My Network</h1>
        <div class="mb-3">
            <a href="/network" class="btn" style="background-color: #D4BFBB; color: #4B3D3D; font-family: 'Regular', sans-serif;">Find Friends</a>
        </div>
    </div>
    @if($friends->count() == 0)
        <p>No friends yet.</p>
    @else
        @foreach($friends as $friend)
            <div class="card mb-2 py-4 px-4 border-0 d-flex flex-row justify-content-between" style="background-color: #D4BFBB;">
                <div class="mb-2 d-flex align-items-center" style="gap: 10px;">
                    <img src="{{ asset('storage/' . $friend->icon) }}" width="70" height="70" style="object-fit: cover; border-radius:50%; background-color: #F2F2F2">
                    <div class="d-flex flex-column">
                        <h3 class="m-0" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">{{ $friend->first_name }} {{ $friend->last_name }}</h3>
                        <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $friend->email }}</span>
                    </div>
                </div>
                <div class="d-flex align-items-center" style="gap: 15px;">
                    <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Friends: {{ $friend->following->count() }}</span>
                    <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Pets: {{ $friend->pets->count() }}</span>
                    <form action="/network/unfriend/{{ $friend->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn" style="background-color: #F9EAE6; border-color: #ff5733; border-width: 3px; color: #4B3D3D; font-family: 'Regular', sans-serif;">Remove Friend</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
@endsection