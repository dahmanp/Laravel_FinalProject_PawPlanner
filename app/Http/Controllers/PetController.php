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

        $attributes = $request->validate([
            'name' => ['required'],
            'species' => ['required'],
            'age' => ['required'],
            'birthday' => ['required'],
            'sex' => ['required'],
            'weight' => ['required'],
            'height' => ['required'],
            'allergies' => ['required'],
            'medicalConditions' => ['required'],
            'icon' => 'nullable|image'
        ]);

        if ($request->hasFile('icon')) {
            $attributes['icon'] = $request->file('icon')->store('peticons', 'public');
        }

        $pet->update($attributes);

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
        $friends = auth()->user()->following;
        return view('pets.share', [
            'friends' => $friends,
            'pet' => $pet,
            'pets' => $pets,
            'menuItems' => app(DashboardController::class)->index()->getData()['menuItems'],
        ]);
    }

    public function storeShare(Request $request)
    {
        $request->validate([
            'pet_id' => ['required', 'exists:pets,id'],
            'friend_id' => ['required', 'exists:users,id'],
        ]);
        $pet = Pet::findOrFail($request->pet_id);
        $friend = User::findOrFail($request->friend_id);

        $friend->pets()->syncWithoutDetaching([$pet->id]);
        return redirect()->route('petpage', $pet->id);
    }

    public function destroy(Pet $pet)
    {
        $pet->users()->detach();
        $pet->delete();
        return redirect('/pets');
    }

    public function removePet(Pet $pet)
    {
        $user = auth()->user();
        $user->pets()->detach($pet->id);
        return redirect('/pets');
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
            'medicalConditions' => ['required'],
            'icon' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if (request()->hasFile('icon')) {
            $attributes['icon'] = request()->file('icon')->store('peticons', 'public');
        }
        $attributes['primaryOwner'] = auth()->id();
        $pet = Pet::create($attributes);
        $user = User::find(auth()->id());
        $user->pets()->attach($pet->id);

        return redirect('/dashboard');
    }
}