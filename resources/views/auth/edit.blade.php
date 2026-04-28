@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body" style="background-color: #D4BFBB">
            <h3 class="card-title mb-4 text-center" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Edit Account</h3>
            
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="/profile/edit">
              @csrf
              @method('PUT')
              <div style="display: flex; gap: 5px;">
                <div class="mb-3">
                  <label for="first_name" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">First Name</label>
                  <input type="first_name" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', auth()->user()->first_name) }}" required>
                </div>
                <div class="mb-3">
                  <label for="last_name" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Last Name</label>
                  <input type="last_name" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}" required>
                </div>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Email address</label>
                <input type="email" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required autofocus>
              </div>
              <div style="display: flex; gap: 5px;">
                <div class="mb-3">
                  <label for="password" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Password</label>
                  <input type="password" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                  <label for="password_confirmation" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Confirm Password</label>
                  <input type="password" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
              </div>
              <div class="mb-3">
                <img src="{{ asset('storage/' . auth()->user()->icon) }}" alt="Profile Picture" width="50" height="50" class="mb-2">
                <label for="icon" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Profile Picture</label>
                <input type="file" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" style="color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="icon" name="icon" accept="image/*">
              </div>
              <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
                  <button type="submit" class="btn" style="background-color: #F9EAE6; border-color: #98FB98; border-width: 3px; color: #4B3D3D; font-family: 'Regular', sans-serif;">Update Account</button><button type="button" onclick="window.location.href='/profile'" class="btn" style="background-color: #F9EAE6; border-color: #ff5733; border-width: 3px; color: #4B3D3D; font-family: 'Regular', sans-serif;">Cancel</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
