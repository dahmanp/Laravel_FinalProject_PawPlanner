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
            <h3 class="card-title mb-4 text-center">Create a Task</h3>
            
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
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="title" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="description" class="form-control" id="description" name="description" value="{{ old('description') }}" required>
              </div>
              <button type="submit" class="btn btn-primary w-50">Create Task</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>