@extends('layouts.app')

@section('title', 'Share Pet')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body" style="background-color: #D4BFBB">
            <h3 class="card-title mb-4 text-center" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Share a Pet</h3>
            
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="/sharepet">
              @csrf
              <div class="mb-3">
                  <label for="pet_id" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Select Pet</label>
                  <select class="form-control" id="pet_id" name="pet_id" required>
                    <option style="color: #4B3D3D; font-family: 'Regular', sans-serif;" value="">-- Select a Pet --</option>

                    @foreach ($pets as $temp)
                      <option style="color: #4B3D3D; font-family: 'Regular', sans-serif;" value="{{ $temp->id }}" {{ old('pet_id', $pet->id) == $temp->id ? 'selected' : '' }}>
                        {{ $temp->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
              <div class="mb-3">
                <label for="description" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Who would you like to share this pet with?</label>
                <select class="form-control" style="color: #4B3D3D; font-family: 'Regular', sans-serif;" name="friend_id" required>
                  <option style="color: #4B3D3D; font-family: 'Regular', sans-serif;" value="">-- Select a Friend --</option>

                  @foreach ($friends as $friend)
                    <option style="color: #4B3D3D; font-family: 'Regular', sans-serif;" value="{{ $friend->id }}">
                      {{ $friend->first_name }} {{ $friend->last_name }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
                  <button type="submit" class="btn" style="background-color: #F9EAE6; border-color: #98FB98; border-width: 3px; color: #4B3D3D; font-family: 'Regular', sans-serif;">Share Pet</button><a href="/dashboard" class="btn" style="background-color: #F9EAE6; border-color: #ff5733; border-width: 3px; color: #4B3D3D; font-family: 'Regular', sans-serif;">Cancel</a>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection