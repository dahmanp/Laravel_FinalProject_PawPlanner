@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Hello <strong>{{ Auth::user()->first_name }}</strong>, welcome to PawPlanner!</h1>
    <h3>Today's Tasks:</h3>

    @php
        $today = strtolower(date('l'));
    @endphp

    @if(Auth::user()->tasks->where($today, true)->count() == 0)
        <p>No tasks scheduled for today.</p>
    @else
        @foreach(Auth::user()->tasks->where($today, true)->sortBy('notification_time') as $task)
            <div class="card mb-2 p-2">
                <h3>{{ $task->title }}</h3>
                <p>{{ $task->description }}</p>
                
                <div style="display: flex; gap: 5px;">
                    <b>Pet: </b> <span>{{ $task->pet->name }}</span>
                </div>
                <div style="display: flex; gap: 5px;">
                    <b>Time: </b> <span>{{ $task->notification_time }}</span>
                </div>
            </div>
        @endforeach
    @endif
@endsection
