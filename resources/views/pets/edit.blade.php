@extends('layouts.app')

@section('title', 'Edit Pet')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h3 class="card-title mb-4 text-center">Edit Pet</h3>
            
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="/pets/{{ $pet->id }}">
              @csrf
              @method('PUT')
              <div style="display: flex; gap: 5px;">
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="string" class="form-control" id="name" name="name" value="{{ old('name', $pet->name) }}" required>
                </div>
                <div class="mb-3">
                  <label for="species" class="form-label">Species</label>
                  <input type="string" class="form-control" id="species" name="species" value="{{ old('species', $pet->species) }}" required>
                </div>
              </div>
              <div style="display: flex; gap: 5px;">
                <div class="mb-3">
                  <label for="age" class="form-label">Age</label>
                  <input type="integer" class="form-control" id="age" name="age" value="{{ old('age', $pet->age) }}" required>
                </div>
                <div class="mb-3">
                  <label for="birthday" class="form-label">Birthday</label>
                  <input type="date" class="form-control" id="birthday" name="birthday" value="{{ old('birthday', $pet->birthday) }}" required>
                </div>
                <div class="mb-3">
                  <label for="sex" class="form-label">Sex</label>
                  <input type="string" class="form-control" id="sex" name="sex" value="{{ old('sex', $pet->sex) }}" required>
                </div>
              </div>
              <div style="display: flex; gap: 5px;">
                <div class="mb-3">
                  <label for="weight" class="form-label">Weight</label>
                  <input type="float" class="form-control" id="weight" name="weight" value="{{ old('weight', $pet->weight) }}" required>
                </div>
                <div class="mb-3">
                  <label for="height" class="form-label">Height</label>
                  <input type="string" class="form-control" id="height" name="height" value="{{ old('height', $pet->height) }}" required>
                </div>
              </div>
              <div class="mb-3">
                <label for="allergies" class="form-label">Allergies</label>
                <input type="string" class="form-control" id="allergies" name="allergies" value="{{ old('allergies', $pet->allergies) }}" required>
              </div>
              <div class="mb-3">
                <label for="medicalConditions" class="form-label">Medical Conditions</label>
                <input type="string" class="form-control" id="medicalConditions" name="medicalConditions" value="{{ old('medicalConditions', $pet->medicalConditions) }}" required>
              </div>
              <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
                  <button type="submit" class="btn btn-primary w-40">Update Pet</button><a href="/petpage/{{ $pet->id }}" class="btn btn-primary w-40">Cancel</a>
              </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection