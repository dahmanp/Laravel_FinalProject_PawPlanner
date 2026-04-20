<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function showCreatepetForm()
    {
        return view('pets.create', [
            'menuItems' => app(DashboardController::class)->index()->getData()['menuItems'],
        ]);
    }

    public function create() {
        return view('pets.create', [
            'menuItems' => app(DashboardController::class)->index()->getData()['menuItems'],
        ]);
    }

    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        return view('pets.edit', compact('pet'), [
            'menuItems' => app(DashboardController::class)->index()->getData()['menuItems'],
        ]);
    }

    public function update(Request $request, $id)
    {
        $pet = Pet::findOrFail($id);

        $pet->update($request->all());

        return redirect('/dashboard');
    }

    public function index()
    {
        $pets = auth()->user()->pets;

        return view('pets.index', [
            'menuItems' => app(DashboardController::class)->index()->getData()['menuItems'],
            'pets' => $pets
        ]);
    }

    public function show(Pet $pet) {
        return view('pets.petpage', [
            'pet' => $pet,
            'menuItems' => app(DashboardController::class)->index()->getData()['menuItems'],
        ]);
    }

    public function share(Pet $pet) {
        $pets = auth()->user()->pets;
        return view('pets.share', [
            'pet' => $pet,
            'pets' => $pets,
            'menuItems' => app(DashboardController::class)->index()->getData()['menuItems'],
        ]);
    }

    public function store() {
        $attributes = request()->validate([
            'name' => ['required'],
            'species' => ['required'],
            'age' => ['required'],
            'birthday' => ['required'],
            'sex' => ['required'],
            'weight' => ['required'],
            'height' => ['required'],
            'allergies' => ['required'],
            'medicalConditions' => ['required']
        ]);

        $pet = Pet::create([
            'name' => request('name'),
            'species' => request('species'),
            'age' => request('age'),
            'birthday' => request('birthday'),
            'sex' => request('sex'),
            'weight' => request('weight'),
            'height' => request('height'),
            'allergies' => request('allergies'),
            'medicalConditions' => request('medicalConditions'),
        ]);

        $user = User::find(auth()->id());
        $user->pets()->attach($pet->id);

        //Pet::create($attributes);

        return redirect('/dashboard');
    }
}