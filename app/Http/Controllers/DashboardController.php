<?php

namespace App\Http\Controllers;

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
                    ['label' => 'All Users', 'route' => 'users.index'],
                    ['label' => 'Add User', 'route' => 'users.create'],
                ],
            ],
            [
                'label' => 'Tasks',
                'icon' => 'bi bi-pencil',
                'route' => 'users.index', //make this the task route
            ],
            [
                'label' => 'Calendar',
                'icon' => 'bi bi-calendar',
                'route' => 'users.index', //calendar route
            ],
        ];

        return view('dashboard', compact('menuItems'));
    }
}