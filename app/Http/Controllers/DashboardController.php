<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TaskController;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $menuItems = [
            [
                'label' => 'Home',
                'icon' => 'bi bi-house',
                'route' => 'dashboard',
            ],
            [
                'label' => 'My Pets',
                'icon' => 'bi bi-people',
                'route' => 'users.index', //pets route
                'children' => [ // MAKE THESE THE USER'S PETS
                    ['label' => 'See Pets', 'route' => 'users.index'],
                    ['label' => 'Add User', 'route' => 'users.create'],
                ],
            ],
            [
                'label' => 'Tasks',
                'icon' => 'bi bi-pencil',
                'route' => 'task.list', //make this the task route
            ],
            [
                'label' => 'Calendar',
                'icon' => 'bi bi-calendar',
                'route' => 'users.index', //calendar route
            ],
            [
                'label' => 'Create Pet',
                'icon' => 'bi bi-plus',
                'route' => 'createpet',
            ],
            [
                'label' => 'Create Task',
                'icon' => 'bi bi-plus',
                'route' => 'createtask',
            ],
        ];

        return view('dashboard', compact('menuItems'));
    }
}