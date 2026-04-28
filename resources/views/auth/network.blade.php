@extends('layouts.app')

@section('title', 'Find a Friend')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body" style="background-color: #D4BFBB">
            <h3 class="card-title mb-4 text-center" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Find a Friend</h3>
            
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="GET" action="/network/search" class="mb-4">
            <div class="mb-3">
              <input type="text" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Bold', sans-serif;" name="email" class="form-control" placeholder="Enter email." value="{{ request('email') }}">
            </div>
            <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
              <button type="submit" class="btn btn-primary w-100" style="background-color: #F9EAE6; border-color: #98FB98; border-width: 3px; color: #4B3D3D; font-family: 'Regular', sans-serif;">Search</button>
            </div>
          </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection