<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function showCreatepetForm()
    {
        return view('pets.create');
    }

    public function create() {
        return view('pets.create');
    }

    public function store() {
        $attributes = request()->validate([
            'name' => ['required'],
            'species' => ['required'],
            'age' => ['required'],
            'weight' => ['required']
        ]);

        Pet::create($attributes);

        return redirect('/dashboard');
    }
}