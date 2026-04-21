@extends('layouts.app')

@section('title', 'My Network')

@section('content')
    <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
        <h1 style="color: #4B3D3D; font-family: 'Bold', sans-serif;">My Network</h1>
        <div class="mb-3">
            <a href="/network" class="btn btn-primary" style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Find Friends</a>
        </div>
    </div>
    @if($friends->count() == 0)
        <p>No friends yet.</p>
    @else
        @foreach($friends as $friend)
            <div class="flex-wrap card mb-2 py-4 px-4 pt-4 pb-2 border-0 d-flex justify-content-center" style="background-color: #D4BFBB;">
                <div class="d-flex justify-content-between align-items-center" style="gap: 5px;">
                    <div class="d-flex justify-content-between align-items-center" style="gap: 8px;">
                        <h3 style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $friend->first_name }} {{ $friend->last_name }}</h3>
                    </div>
                    <div class="mb-3">
                        <form action="/network/unfriend/{{ $friend->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Remove Friend</button>
                        </form>
                    </div>
                </div>
                <small class="mb-3" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">{{ $friend->email }}</small>

                <small class="mb-3" style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Friend Count: {{ optional($friend->friends)->count() ?? 0 }}</small>
                <small class="mb-3" style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Pet Count: {{ optional($friend->pets)->count() ?? 0 }}</small>
            </div>
        @endforeach
    @endif
@endsection