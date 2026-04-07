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
            <h3 class="card-title mb-4 text-center">Create a Pet</h3>
            
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="/createpet">
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
              </div>
              <div class="mb-3">
                <label for="species" class="form-label">Species</label>
                <input type="species" class="form-control" id="species" name="species" value="{{ old('species') }}" required>
              </div>
              <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="age" class="form-control" id="age" name="age" value="{{ old('age') }}" required>
              </div>
              <div class="mb-3">
                <label for="weight" class="form-label">Weight</label>
                <input type="weight" class="form-control" id="weight" name="weight" value="{{ old('weight') }}" required>
              </div>
              <button type="submit" class="btn btn-primary w-50">Create Pet</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>