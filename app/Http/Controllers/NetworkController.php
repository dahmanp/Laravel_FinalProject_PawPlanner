<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class NetworkController extends Controller
{
    public function network() {
        return view('auth.network', [
            'menuItems' => app(DashboardController::class)->index()->getData()['menuItems'],
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'email' => 'required|string'
        ]);

        $query = $request->input('email');

        $users = User::where('email', 'LIKE', "%{$query}%")
            ->where('id', '!=', auth()->id())
            ->get();

        return view('auth.network.search', compact('users', 'query'), [
            'menuItems' => app(DashboardController::class)->index()->getData()['menuItems'],
        ]);
    }
    
    public function index()
    {
        $friends = auth()->user()->following;

        return view('auth.network.index', compact('friends'), [
            'menuItems' => app(DashboardController::class)->index()->getData()['menuItems'],
        ]);
    }

    public function unfriend($id)
    {
        $user = auth()->user();
        $user->following()->detach($id);
        return redirect()->back();
    }

    public function friend($id)
    {
        $user = auth()->user();
        if (!$user->following()->where('friend_id', $id)->exists()) {
            $user->following()->attach($id);
        }
        return redirect('/mynetwork');
    }
}
