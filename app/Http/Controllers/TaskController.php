<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function showCreatepetForm()
    {
        return view('tasks.create');
    }

    public function create() {
        return view('tasks.create');
    }

    public function store() {
        $attributes = request()->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);

        Task::create($attributes);

        return redirect('/dashboard');
    }
}