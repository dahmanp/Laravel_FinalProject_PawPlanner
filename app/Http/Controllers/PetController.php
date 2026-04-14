<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
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

        $pet = Pet::create([
            'name' => request('name'),
            'species' => request('species'),
            'age' => request('age'),
            'weight' => request('weight'),
        ]);

        $user = User::find(auth()->id());
        $user->pets()->attach($pet->id);

        //Pet::create($attributes);

        return redirect('/dashboard');
    }
}