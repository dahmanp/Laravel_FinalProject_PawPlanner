@extends('layouts.app')

@section('title', 'Task List')

@section('content')
    <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
        <h1>My Tasks</h1>
        <div class="mb-3">
            <a href="/createtask" class="btn btn-primary">Create Task</a>
        </div>
    </div>

    @if($tasks->count() == 0)
        <p>No tasks yet.</p>
    @else
        @foreach($tasks as $task)
            <div class="card mb-2 p-2">
                <h3>{{ $task->title }}</h3>
                <p>{{ $task->description }}</p>
                <div style="display: flex; gap: 5px;">
                    <b>Pet: </b> <span>{{ $task->pet->name }}</span>
                </div>
                <div style="display: flex; gap: 5px;">
                    <b>Time: </b> <span>{{ $task->notification_time }}</span>
                </div>
                <div style="display: flex; gap: 5px;">
                    <b>Reminder Notification: </b> <span>{{ $task->multiple_notifs ? $task->second_notification_time : 'None'}}</span>
                </div>
                <div style="display: flex; gap: 5px;">
                    <b>Days: </b>
                    <div class="mb-2">
                        <span>{{ $task->monday ? 'Monday' : ''}}</span>
                        <span>{{ $task->tuesday ? 'Tuesday' : ''}}</span>
                        <span>{{ $task->wednesday ? 'Wednesday' : ''}}</span>
                        <span>{{ $task->thursday ? 'Thursday' : ''}}</span>
                        <span>{{ $task->friday ? 'Friday' : ''}}</span>
                        <span>{{ $task->saturday ? 'Saturday' : ''}}</span>
                        <span>{{ $task->sunday ? 'Sunday' : ''}}</span>
                    </div>
                </div>
                <div class="mb-3"><a href="/tasks/{{ $task->id }}/edit" class="btn btn-primary w-10">Edit Task</a></div>
            </div>
        @endforeach
    @endif
@endsection