@extends('layouts.app')

@section('title', 'Search Users')

@section('content')
  <div class="container">
    <div class="mb-3 d-flex justify-content-between align-items-center">
      <h3 class="m-0" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Search Results for "{{ $query }}"</h3>
      <a href="/network" class="btn" style="background-color: #D4BFBB; color: #4B3D3D;">Return to Search</a>
    </div>
    @if($users->isEmpty())
      <p style="color: #4B3D3D; font-family: 'Regular', sans-serif;">No users found.</p>
    @else
      <ul class="list-group">
        @foreach($users as $user)
          <div class="card mb-2 py-4 px-4 border-0 d-flex flex-row justify-content-between" style="background-color: #D4BFBB;">
            <div class="mb-2 d-flex align-items-center" style="gap: 10px;">
              <img src="{{ asset('storage/' . $user->icon) }}" width="70" height="70" style="object-fit: cover; border-radius:50%; background-color: #F2F2F2">
              <div class="d-flex flex-column">
                <h3 class="m-0" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">{{ $user->first_name }} {{ $user->last_name }}</h3>
                <span style="color: #4B3D3D; font-family: 'Regular', sans-serif; font-size">{{ $user->email }}</span>
              </div>
            </div>
            <div class="flex-shrink-0">
              <form action="/network/friend/{{ $user->id }}" method="POST">
                @csrf
                <button class="btn" class="btn" style="background-color: #F9EAE6; border-color: #98FB98; border-width: 3px; color: #4B3D3D;">Add Friend</button>
              </form>
            </div>
          </div>
        @endforeach
      </ul>
    @endif
  </div>
@endsection