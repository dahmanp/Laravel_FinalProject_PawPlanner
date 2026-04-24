@extends('layouts.blank')

@section('title', 'Login')

@section('content')
  <div class="mb-3 d-flex flex-column align-items-center justify-content-center" style="gap: 10px">
    <img src="{{ asset('images/Pawplanner_logo.png') }}" alt="Logo">
    <h2 class="card-title mb-4 text-center" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Welcome to PawPlanner!</h2>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body" style="background-color: #D4BFBB">
            <h3 class="card-title mb-4 text-center" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Login</h3>
            
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="{{ url('/login') }}">
              @csrf
              <div class="mb-3">
                <label for="email" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Email address</label>
                <input type="email" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Password</label>
                <input type="password" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="password" name="password" required>
              </div>
              <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
                  <button type="submit" class="btn" style="background-color: #F9EAE6; border-color: #98FB98; border-width: 3px; color: #4B3D3D; font-family: 'Regular', sans-serif;">Login</button><button type="button" onclick="window.location.href='/register'" class="btn" style="background-color: #F9EAE6; color: #4B3D3D; font-family: 'Regular', sans-serif;">Create Account</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection