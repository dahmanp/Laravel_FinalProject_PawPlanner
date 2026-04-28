<h2>{{ $task->title }}</h2>

<p>{{ $task->description }}</p>

<hr>

@if($type === 'first')
    <p>This is your first scheduled reminder.</p>
@else
    <p>This is your second scheduled reminder.</p>
@endif

<p><strong>Pet:</strong> {{ $task->pet->name ?? 'N/A' }}</p>

<p><strong>Scheduled time:</strong> {{ $task->notification_time }}</p>