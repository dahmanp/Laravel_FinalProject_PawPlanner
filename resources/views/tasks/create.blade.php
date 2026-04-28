@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body" style="background-color: #D4BFBB">
            <h3 class="card-title mb-4 text-center" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Create a Task</h3>
            
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="/createtask">
              @csrf
              <div style="display: flex; gap: 5px;">
                <div class="mb-3">
                  <label for="pet_id" style="color: #4B3D3D; font-family: 'Bold', sans-serif;" class="form-label">Select Pet</label>
                  <select class="form-control" style="color: #4B3D3D; font-family: 'Regular', sans-serif;" id="pet_id" name="pet_id" required>
                    <option style="color: #4B3D3D; font-family: 'Regular', sans-serif;" value="">-- Select a Pet --</option>

                    @foreach ($pets as $pet)
                      <option style="color: #4B3D3D; font-family: 'Regular', sans-serif;" value="{{ $pet->id }}" {{ old('pet_id') == $pet->id ? 'selected' : '' }}>
                        {{ $pet->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="title" style="color: #4B3D3D; font-family: 'Bold', sans-serif;" class="form-label">Title</label>
                  <input type="title" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                </div>
              </div>
              <div class="mb-3">
                  <label for="description" style="color: #4B3D3D; font-family: 'Bold', sans-serif;" class="form-label">Description</label>
                  <input type="description" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="description" name="description" value="{{ old('description') }}" required>
                </div>
              <div class="mb-3">
                <label for="title" style="color: #4B3D3D; font-family: 'Bold', sans-serif;" class="form-label">Day(s)</label>
                <div style="display: flex; gap: 5px;">
                  <input class="form-check-input" style="background-color: rgba(255, 255, 255, 0.25);" type="checkbox" id="monday" name="monday" value="1" {{ old('monday') ? 'checked' : '' }}>
                  <label class="form-check-label" for="monday" style="color: #4B3D3D; font-family: 'Regular', sans-serif;">
                    Monday
                  </label>
                  <input class="form-check-input" style="background-color: rgba(255, 255, 255, 0.25);" type="checkbox" id="tuesday" name="tuesday" value="1" {{ old('tuesday') ? 'checked' : '' }}>
                  <label class="form-check-label" for="tuesday" style="color: #4B3D3D; font-family: 'Regular', sans-serif;">
                    Tuesday
                  </label>
                  <input class="form-check-input" style="background-color: rgba(255, 255, 255, 0.25);"type="checkbox" id="wednesday" name="wednesday" value="1" {{ old('wednesday') ? 'checked' : '' }}>
                  <label class="form-check-label" for="wednesday" style="color: #4B3D3D; font-family: 'Regular', sans-serif;">
                    Wednesday
                  </label>
                </div>
                <div style="display: flex; gap: 5px;">
                  <input class="form-check-input" style="background-color: rgba(255, 255, 255, 0.25);" type="checkbox" id="thursday" name="thursday" value="1" {{ old('thursday') ? 'checked' : '' }}>
                <label class="form-check-label" for="thursday" style="color: #4B3D3D; font-family: 'Regular', sans-serif;">
                  Thursday
                </label>
                <input class="form-check-input" style="background-color: rgba(255, 255, 255, 0.25);" type="checkbox" id="friday" name="friday" value="1" {{ old('friday') ? 'checked' : '' }}>
                <label class="form-check-label" for="friday" style="color: #4B3D3D; font-family: 'Regular', sans-serif;">
                  Friday
                </label>
                <input class="form-check-input" style="background-color: rgba(255, 255, 255, 0.25);" type="checkbox" id="saturday" name="saturday" value="1" {{ old('saturday') ? 'checked' : '' }}>
                <label class="form-check-label" for="saturday" style="color: #4B3D3D; font-family: 'Regular', sans-serif;">
                  Saturday
                </label>
                <input class="form-check-input" style="background-color: rgba(255, 255, 255, 0.25);" type="checkbox" id="sunday" name="sunday" value="1" {{ old('sunday') ? 'checked' : '' }}>
                <label class="form-check-label" for="sunday" style="color: #4B3D3D; font-family: 'Regular', sans-serif;">
                  Sunday
                </label>
                </div>
              </div>
              <div class="mb-3">
                <label for="notification_time" style="color: #4B3D3D; font-family: 'Bold', sans-serif;" class="form-label">Reminder Time</label>
                <input type="time" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="notification_time" name="notification_time" value="{{ old('notification_time') }}" required>
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" type="checkbox" id="multiple_notifs" name="multiple_notifs" value="1" {{ old('multiple_notifs') ? 'checked' : '' }}>
                <label style="color: #4B3D3D; font-family: 'Bold', sans-serif;" class="form-check-label" for="multiple_notifs">
                  Do you want a second reminder?
                </label>
              </div>
              <div class="mb-3">
                  <label for="second_notification_time" style="color: #4B3D3D; font-family: 'Bold', sans-serif;" class="form-label">Second Reminder Time</label>
                  <input type="time" class="form-control" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" id="second_notification_time" name="second_notification_time" value="{{ old('second_notification_time') }}">
                </div>
              <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
                  <button type="submit" class="btn" style="background-color: #F9EAE6; border-color: #98FB98; border-width: 3px; color: #4B3D3D; font-family: 'Regular', sans-serif;">Create Task</button><a href="/dashboard" class="btn" style="background-color: #F9EAE6; border-color: #ff5733; border-width: 3px; color: #4B3D3D; font-family: 'Regular', sans-serif;">Cancel</a>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection