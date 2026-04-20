@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h3 class="card-title mb-4 text-center">Edit Account</h3>
            
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
              <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="first_name" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', auth()->user()->first_name) }}" required>
              </div>
              <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="last_name" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required autofocus>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
              </div>
              <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
                  <button type="submit" class="btn btn-primary w-50">Update Account</button><button type="button" onclick="window.location.href='/profile'" class="btn btn-primary w-50">Cancel</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection