@extends('layouts.app')

@section('title', 'Pet Page')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h3 class="card-title mb-4 text-center">Edit Task: {{ $task->title }}</h3>
            
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="/tasks/{{ $task->id }}">
              @csrf
              @method('PUT')
              <div style="display: flex; gap: 5px;">
                <div class="mb-3">
                  <label for="pet_id" class="form-label">Select Pet</label>
                  <select class="form-control" id="pet_id" name="pet_id" required>
                    <option value="">-- Select a Pet --</option>

                    @foreach ($pets as $pet)
                      <option value="{{ $pet->id }}" {{ old('pet_id', $task->pet_id) == $pet->id ? 'selected' : '' }}>
                        {{ $pet->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="title" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}" required>
                </div>
              </div>
              <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <input type="description" class="form-control" id="description" name="description" value="{{ old('description', $task->description) }}" required>
                </div>
              <div class="mb-3">
                <label for="title" class="form-label">Day(s)</label>
                <div style="display: flex; gap: 5px;">
                  <input class="form-check-input" type="checkbox" id="monday" name="monday" value="1" {{ old('monday', $task->monday) ? 'checked' : '' }}>
                  <label class="form-check-label" for="monday">
                    Monday
                  </label>
                  <input class="form-check-input" type="checkbox" id="tuesday" name="tuesday" value="1" {{ old('tuesday', $task->tuesday) ? 'checked' : '' }}>
                  <label class="form-check-label" for="tuesday">
                    Tuesday
                  </label>
                  <input class="form-check-input" type="checkbox" id="wednesday" name="wednesday" value="1" {{ old('wednesday', $task->wednesday) ? 'checked' : '' }}>
                  <label class="form-check-label" for="wednesday">
                    Wednesday
                  </label>
                </div>
                <div style="display: flex; gap: 5px;">
                  <input class="form-check-input" type="checkbox" id="thursday" name="thursday" value="1" {{ old('thursday', $task->thursday) ? 'checked' : '' }}>
                <label class="form-check-label" for="thursday">
                  Thursday
                </label>
                <input class="form-check-input" type="checkbox" id="friday" name="friday" value="1" {{ old('friday', $task->friday) ? 'checked' : '' }}>
                <label class="form-check-label" for="friday">
                  Friday
                </label>
                <input class="form-check-input" type="checkbox" id="saturday" name="saturday" value="1" {{ old('saturday', $task->saturday) ? 'checked' : '' }}>
                <label class="form-check-label" for="saturday">
                  Saturday
                </label>
                <input class="form-check-input" type="checkbox" id="sunday" name="sunday" value="1" {{ old('sunday', $task->sunday) ? 'checked' : '' }}>
                <label class="form-check-label" for="sunday">
                  Sunday
                </label>
                </div>
              </div>
              <div class="mb-3">
                <label for="notification_time" class="form-label">Reminder Time</label>
                <input type="time" class="form-control" id="notification_time" name="notification_time" value="{{ old('notification_time', $task->notification_time) }}" required>
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="multiple_notifs" name="multiple_notifs" value="1" {{ old('multiple_notifs', $task->multiple_notifs) ? 'checked' : '' }}>
                <label class="form-check-label" for="multiple_notifs">
                  Do you want a second reminder?
                </label>
              </div>
              <div class="mb-3">
                  <label for="second_notification_time" class="form-label">Second Reminder Time</label>
                  <input type="time" class="form-control" id="second_notification_time" name="second_notification_time" value="{{ old('second_notification_time', $task->second_notification_time) }}">
                </div>
              <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
                  <button type="submit" class="btn btn-primary w-40">Update Task</button><a href="/tasks" class="btn btn-primary w-40">Cancel</a>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection