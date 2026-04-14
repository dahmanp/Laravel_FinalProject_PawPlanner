<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light d-flex align-items-center" style="height: 100vh;">

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

            <form method="POST" action="/edittask/{{ $task->title }}">
              @csrf
              @method('PATCH')
              <div class="mb-3">
                <label for="pet_id" class="form-label">Select Pet</label>
                <select class="form-control" id="pet_id" name="pet_id" required>
                  <option value="">-- Select a Pet --</option>

                  @foreach ($pets as $pet)
                    <option value="{{ $pet->id }}" {{ old('pet_id') == $pet->id ? 'selected' : '' }}>
                      {{ $pet->name }}
                    </option>
                  @endforeach

                </select>
              </div>
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="title" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="description" class="form-control" id="description" name="description" value="{{ old('description') }}" required>
              </div>
              <div class="mb-3">
                <label for="title" class="form-label">Day(s)</label>
                <input class="form-check-input" type="checkbox" id="monday" name="monday" value="1" {{ old('monday') ? 'checked' : '' }}>
                <label class="form-check-label" for="monday">
                  Monday
                </label>
                <input class="form-check-input" type="checkbox" id="tuesday" name="tuesday" value="1" {{ old('tuesday') ? 'checked' : '' }}>
                <label class="form-check-label" for="tuesday">
                  Tuesday
                </label>
                <input class="form-check-input" type="checkbox" id="wednesday" name="wednesday" value="1" {{ old('wednesday') ? 'checked' : '' }}>
                <label class="form-check-label" for="wednesday">
                  Wednesday
                </label>
                <input class="form-check-input" type="checkbox" id="thursday" name="thursday" value="1" {{ old('thursday') ? 'checked' : '' }}>
                <label class="form-check-label" for="thursday">
                  Thursday
                </label>
                <input class="form-check-input" type="checkbox" id="friday" name="friday" value="1" {{ old('friday') ? 'checked' : '' }}>
                <label class="form-check-label" for="friday">
                  Friday
                </label>
                <input class="form-check-input" type="checkbox" id="saturday" name="saturday" value="1" {{ old('saturday') ? 'checked' : '' }}>
                <label class="form-check-label" for="saturday">
                  Saturday
                </label>
                <input class="form-check-input" type="checkbox" id="sunday" name="sunday" value="1" {{ old('sunday') ? 'checked' : '' }}>
                <label class="form-check-label" for="sunday">
                  Sunday
                </label>
              </div>
              <div class="mb-3">
                <label for="notification_time" class="form-label">Reminder Time</label>
                <input type="time" class="form-control" id="notification_time" name="notification_time" value="{{ old('notification_time') }}" required>
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="multiple_notifs" name="multiple_notifs" value="1" {{ old('multiple_notifs') ? 'checked' : '' }}>
                <label class="form-check-label" for="multiple_notifs">
                  Do you want a second reminder?
                </label>
              </div>
              <div class="mb-3">
                  <label for="second_notification_time" class="form-label">Second Reminder Time</label>
                  <input type="time" class="form-control" id="second_notification_time" name="second_notification_time" value="{{ old('second_notification_time') }}">
                </div>
              <button type="submit" class="btn btn-primary w-50">Edit Task</button><a href="/dashboard" class="btn btn-primary w-50">Cancel</a>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>