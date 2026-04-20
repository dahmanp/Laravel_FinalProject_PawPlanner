<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TaskController;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pets = auth()->user()->pets->map(function ($pet) {
            return [
                'label' => $pet->name,
                'route' => 'petpage',
                'params' => ['pet' => $pet->id],
            ];
        })->toArray();

        $menuItems = [
            [
                'label' => 'Home',
                'icon' => 'bi bi-house',
                'route' => 'dashboard',
            ],
            [
                'label' => 'My Network',
                'icon' => 'bi bi-diagram-3',
                'route' => 'mynetwork',
            ],
            [
                'label' => 'My Pets',
                'icon' => 'bi bi-bookmark-heart',
                'route' => 'pet.list',
                'children' => array_merge([
                    ['label' => 'All Pets', 'route' => 'pet.list'],
                ],
                $pets)
            ],
            [
                'label' => 'Create Pet',
                'icon' => 'bi bi-bookmark-plus',
                'route' => 'createpet',
            ],
            [
                'label' => 'Tasks',
                'icon' => 'bi bi-clipboard2',
                'route' => 'task.list',
            ],
            [
                'label' => 'Create Task',
                'icon' => 'bi bi-clipboard2-plus',
                'route' => 'createtask',
            ],
        ];

        return view('dashboard', compact('menuItems'));
    }
}