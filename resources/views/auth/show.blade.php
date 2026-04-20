@extends('layouts.app')

@section('title', 'Account Page')

@section('content')
    <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
        <h1>Account Details for: {{ auth()->user()->first_name }}</h1>
        <div class="mb-3">
            <a href="/profile/edit" class="btn btn-primary w-10">Edit Account</a>
            <form action="{{ route('users.destroy') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? This cannot be undone.');" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Account</button>
            </form>
        </div>
    </div>

    <div class="card mb-2 p-2">
                <div style="display: flex; gap: 5px;">
                    <b>First Name: </b> <span>{{ auth()->user()->first_name }}</span>
                </div>
                <div style="display: flex; gap: 5px;">
                    <b>Last Name: </b> <span>{{ auth()->user()->last_name }}</span>
                </div>
                <div style="display: flex; gap: 5px;">
                    <b>Email: </b> <span>{{ auth()->user()->email }}</span>
                </div>
            </div>
@endsection