<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\TaskAlert;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function showCreatepetForm()
    {
        return view('tasks.create', [
            'menuItems' => app(DashboardController::class)->index()->getData()['menuItems'],
        ]);
    }

    public function create()
    {
        $pets = auth()->user()->pets;

        return view('tasks.create', compact('pets'), [
            'menuItems' => app(DashboardController::class)->index()->getData()['menuItems'],
        ]);
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $pets = Auth::user()->pets;

        return view('tasks.edit', compact('task', 'pets'),  [
            'menuItems' => app(DashboardController::class)->index()->getData()['menuItems'],
        ]);
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $task->update($request->all());

        return redirect('/dashboard');
    }

    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->get();

        return view('tasks.index', [
            'menuItems' => app(DashboardController::class)->index()->getData()['menuItems'],
            'tasks' => $tasks
        ]);
    }

    public function store(Request $request)
    {
        $secondTime = $request->filled('second_notification_time')
            ? $request->second_notification_time
            : $request->notification_time;
            
        $attributes = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'notification_time' => ['required', 'date_format:H:i'],
            'multiple_notifs' => ['nullable', 'boolean'],
            'monday' => ['nullable', 'boolean'],
            'tuesday' => ['nullable', 'boolean'],
            'wednesday' => ['nullable', 'boolean'],
            'thursday' => ['nullable', 'boolean'],
            'friday' => ['nullable', 'boolean'],
            'saturday' => ['nullable', 'boolean'],
            'sunday' => ['nullable', 'boolean'],
            'pet_id' => ['required'],
        ]);

        $data = $attributes;

        $fields = [
            'monday','tuesday','wednesday','thursday',
            'friday','saturday','sunday','multiple_notifs'
        ];

        foreach ($fields as $field) {
            $data[$field] = $request->boolean($field);
        }

        $secondTime = $request->filled('second_notification_time')
            ? $request->second_notification_time
            : $request->notification_time;

        $task = Task::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'notification_time' => $data['notification_time'],
            'second_notification_time' => $secondTime,
            'multiple_notifs' => $data['multiple_notifs'],
            'monday' => $data['monday'],
            'tuesday' => $data['tuesday'],
            'wednesday' => $data['wednesday'],
            'thursday' => $data['thursday'],
            'friday' => $data['friday'],
            'saturday' => $data['saturday'],
            'sunday' => $data['sunday'],
            'user_id' => auth()->id(),
            'pet_id' => $data['pet_id'],
        ]);

        //Mail::to($task->user->email)->send(new TaskAlert($task));

        return redirect('/tasks');
    }
}