@extends('layouts.app')

@section('title', 'Search Users')

@section('content')
  <div class="container">
    <h3>Search Results for "{{ $query }}"</h3>
    @if($users->isEmpty())
      <p>No users found.</p>
    @else
      <ul class="list-group">
        @foreach($users as $user)
          <div class="card mb-2 py-4 px-4 pt-4 pb-2 border-0 d-flex justify-content-center" style="background-color: #D4BFBB;">
            <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
              <div class="d-flex justify-content-between align-items-center" style="gap: 8px;">
                <h3 style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $user->first_name }} {{ $user->last_name }}</h1>
              </div>
            </div>
            <div class="mb-2" style="display: flex; gap: 5px;">
              <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $user->email }}</span>
            </div>
            <form action="/network/friend/{{ $user->id }}" method="POST">
                @csrf
                <button class="btn btn-primary">Add Friend</button>
            </form>
          </div>
        @endforeach
      </ul>
    @endif
  </div>
@endsection