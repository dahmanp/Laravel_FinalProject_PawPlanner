@extends('layouts.app')

@section('title', 'Task List')

@section('content')
    <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
        <h1 style="color: #4B3D3D; font-family: 'Bold', sans-serif;">My Tasks</h1>
        <div class="mb-3">
            <a href="/createtask" class="btn" style="background-color: #D4BFBB; color: #4B3D3D; font-family: 'Regular', sans-serif;">Create Task</a>
        </div>
    </div>

    @if($tasks->count() == 0)
        <p>No tasks yet.</p>
    @else
        <div class="flex-wrap d-flex align-items-center justify-content-center" style="gap: 15px">
            @foreach($tasks as $task)
            <div class="card mb-2 py-4 px-4 pt-4 pb-2 border-0 d-flex justify-content-center" style="background-color: #D4BFBB; min-width: 500px">
                <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
                    <div class="card mb-1 p-2 d-flex flex-row align-items-center border-0" style="background-color: #B09796; width: fit-content; min-width: 500px; gap: 15px;">
                        <img src="{{ asset('storage/' . $task->pet->icon) }}" width="100" height="100" style="object-fit: cover; border-radius:50%; background-color: #F2F2F2">
                        <h3 class="m-0" style="color: #4B3D3D; font-family: 'Bold', sans-serif;">{{ $task->title }}</h3>
                        <div class="ms-auto">
                            <a href="/tasks/{{ $task->id }}/edit" class="btn" style="background-color: #D4BFBB; border-color: #98FB98; border-width: 3px; color: #4B3D3D; font-family: 'Regular', sans-serif;">Edit Task</a>
                            @if(Auth()->user()->id == $task->user->id)
                                <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn" style="background-color: #D4BFBB; border-color: #ff5733; border-width: 3px; color: #4B3D3D; font-family: 'Regular', sans-serif;">Delete Task</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                <p style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $task->description }}</p>
                <div style="display: flex; gap: 5px;">
                    <b style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Pet: </b> <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $task->pet->name }}</span>
                </div>
                <div style="display: flex; gap: 5px;">
                    <b style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Time: </b> <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $task->notification_time }}</span>
                </div>
                <div style="display: flex; gap: 5px;">
                    <b style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Reminder Notification: </b> <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $task->multiple_notifs ? $task->second_notification_time : 'None'}}</span>
                </div>
                    <div class="mb-2">
                        <b style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Days: </b>
                        <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $task->monday ? 'Monday' : ''}}</span>
                        <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $task->tuesday ? 'Tuesday' : ''}}</span>
                        <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $task->wednesday ? 'Wednesday' : ''}}</span>
                        <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $task->thursday ? 'Thursday' : ''}}</span>
                        <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $task->friday ? 'Friday' : ''}}</span>
                        <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $task->saturday ? 'Saturday' : ''}}</span>
                        <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ $task->sunday ? 'Sunday' : ''}}</span>
                    </div>
            </div>
        @endforeach
        </div>
    @endif
@endsection