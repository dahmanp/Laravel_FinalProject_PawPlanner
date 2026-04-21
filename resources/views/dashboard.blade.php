@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="d-flex align-items-center justify-content-center" style="color: #4B3D3D; font-family: 'Regular', sans-serif;">
        <strong>{{ Auth::user()->first_name }}</strong>, welcome to PawPlanner!
    </h1>
    <div class="card mb-3 pl-2 pr-2 border-0 d-flex align-items-center justify-content-center" style="background-color: #D4BFBB;">
        <div class="card pt-3 pb-2 border-0 text-center" style="background-color: #B09796; width: 700px;">
            <h3 style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Today's Tasks:</h3>
        </div>
    </div>
    @php
        $today = strtolower(date('l'));
    @endphp

    @if(Auth::user()->tasks->where($today, true)->count() == 0)
        <p>No tasks scheduled for today.</p>
    @else
        <div class="flex-wrap d-flex align-items-center justify-content-center" style="gap: 15px">
            @foreach(Auth::user()->tasks->where($today, true)->sortBy('notification_time') as $task)
                <div class="card mb-2 border-0 align-items-center" style="background-color: #D4BFBB; width: fit-content">
                    <div class="card mb-1 p-2 d-flex flex-row align-items-center border-0" style="background-color: #B09796; width: fit-content; min-width: 500px; gap: 15px;">
                        <img src="{{ asset('storage/' . $task->pet->icon) }}" width="100" height="100" style="object-fit: cover; border-radius:50%; background-color: #F2F2F2">
                        <h3 class="m-0" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">{{ $task->title }}</h3>
                    </div>
                    <div class="card mb-1 pt-2 pb-2 p-2 border-0 align-items-center" style="background-color: #D4BFBB; width: fit-content; min-width: 500px;">
                        <p style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $task->description }}</p>
                    </div>
                    <div class="card mx-1 my-1 pt-2 pb-2 p-2 border-0 align-items-center" style="background-color: #F9EAE6; width: fit-content; min-width: 400px">
                        <div style="display: flex; gap: 5px;">
                            <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">For </span><span style="color: #4B3D3D; font-family: 'Bold', sans-serif;">{{ $task->pet->name }}</span>
                            <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;"> at </span><span style="color: #4B3D3D; font-family: 'Bold', sans-serif;">{{ $task->notification_time }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
