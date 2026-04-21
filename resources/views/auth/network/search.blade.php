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
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
              <strong>{{ $user->first_name }} {{ $user->last_name }}</strong><br>
              <small>{{ $user->email }}</small>
            </div>
            <form action="/network/friend/{{ $user->id }}" method="POST">
                @csrf
                <button class="btn btn-primary">Add Friend</button>
            </form>
          </li>
        @endforeach
      </ul>
    @endif
  </div>
@endsection