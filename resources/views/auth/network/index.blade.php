@extends('layouts.app')

@section('title', 'My Network')

@section('content')
    <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
        <h1>My Network</h1>
        <div class="mb-3">
            <a href="/network" class="btn btn-primary">Find Friends</a>
        </div>
    </div>
    @if($friends->count() == 0)
        <p>No friends yet.</p>
    @else
        @foreach($friends as $friend)
            <div class="card mb-2 p-2">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $friend->first_name }} {{ $friend->last_name }}</strong><br>
                    <small>{{ $friend->email }}</small>
                </div>
                <form action="/network/unfriend/{{ $friend->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Remove Friend</button>
                </form>
                </li>
            </div>
        @endforeach
    @endif
@endsection