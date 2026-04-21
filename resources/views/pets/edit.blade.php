@extends('layouts.app')

@section('title', 'Edit Pet')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body" style="background-color: #D4BFBB">
            <h3 class="card-title mb-4 text-center" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Edit Pet</h3>
            
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="/pets/{{ $pet->id }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div style="display: flex; gap: 5px;">
                <div class="mb-3">
                  <label for="name" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Name</label>
                  <input type="string" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="name" name="name" value="{{ old('name', $pet->name) }}" required>
                </div>
                <div class="mb-3">
                  <label for="species" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Species</label>
                  <input type="string" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="species" name="species" value="{{ old('species', $pet->species) }}" required>
                </div>
              </div>
              <div style="display: flex; gap: 5px;">
                <div class="mb-3">
                  <label for="age" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Age</label>
                  <input type="integer" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="age" name="age" value="{{ old('age', $pet->age) }}" required>
                </div>
                <div class="mb-3">
                  <label for="birthday" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Birthday</label>
                  <input type="date" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="birthday" name="birthday" value="{{ old('birthday', $pet->birthday) }}" required>
                </div>
                <div class="mb-3">
                  <label for="sex" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Sex</label>
                  <input type="string" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="sex" name="sex" value="{{ old('sex', $pet->sex) }}" required>
                </div>
              </div>
              <div style="display: flex; gap: 5px;">
                <div class="mb-3">
                  <label for="weight" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Weight</label>
                  <input type="float" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="weight" name="weight" value="{{ old('weight', $pet->weight) }}" required>
                </div>
                <div class="mb-3">
                  <label for="height" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Height</label>
                  <input type="string" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="height" name="height" value="{{ old('height', $pet->height) }}" required>
                </div>
              </div>
              <div class="mb-3">
                <label for="allergies" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Allergies</label>
                <input type="string" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="allergies" name="allergies" value="{{ old('allergies', $pet->allergies) }}" required>
              </div>
              <div class="mb-3">
                <label for="medicalConditions" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Medical Conditions</label>
                <input type="string" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="medicalConditions" name="medicalConditions" value="{{ old('medicalConditions', $pet->medicalConditions) }}" required>
              </div>
              <div class="mb-3">
                <img src="{{ asset('storage/' . $pet->icon) }}" alt="Pet Icon" width="50" height="50" class="mb-2">
                <label for="icon" class="form-label" style="color: #4B3D3D; font-family: 'Bold', sans-serif;" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Pet Icon</label>
                <input type="file" style="background-color: rgba(255, 255, 255, 0.25); color: #4B3D3D; font-family: 'Regular', sans-serif;" style="color: #4B3D3D; font-family: 'Regular', sans-serif;" class="form-control" id="icon" name="icon" accept="image/*">
              </div>
              <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
                  <button type="submit" class="btn btn-primary w-40" style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Update Pet</button><a href="/petpage/{{ $pet->id }}" class="btn btn-primary w-40" style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Cancel</a>
              </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection