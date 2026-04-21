@extends('layouts.app')

@section('title', 'Share Pet')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h3 class="card-title mb-4 text-center">Share a Pet</h3>
            
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
                  <label for="pet_id" class="form-label">Select Pet</label>
                  <select class="form-control" id="pet_id" name="pet_id" required>
                    <option value="">-- Select a Pet --</option>

                    @foreach ($pets as $temp)
                      <option value="{{ $temp->id }}" {{ old('pet_id', $pet->id) == $temp->id ? 'selected' : '' }}>
                        {{ $temp->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
              <div class="mb-3">
                <label for="description" class="form-label">Who would you like to share this pet with?</label>
                <select class="form-control" name="friend_id" required>
                  <option value="">-- Select a Friend --</option>

                  @foreach ($friends as $friend)
                    <option value="{{ $friend->id }}">
                      {{ $friend->first_name }} {{ $friend->last_name }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
                  <button type="submit" class="btn btn-primary w-40">Share Pet</button><a href="/dashboard" class="btn btn-primary w-40">Cancel</a>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection