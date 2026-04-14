@extends('layouts.app')

@section('title', 'Pet List')

@section('content')
    <h1>Pets</h1>

    @if($tasks->count() == 0)
        <p>No pets yet.</p>
    @else
        @foreach($tasks as $task)
            <div class="card mb-2 p-2">
                <strong>{{ $task->title }}</strong>
                <p>{{ $task->description }}</p>
            </div>
        @endforeach
    @endif
@endsection