@extends('layouts.app')

@section('title', 'Account Page')

@section('content')
    <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 5px;">
        <div class="mb-2 d-flex justify-content-between align-items-center" style="gap: 7px;">
            <img src="{{ asset('storage/' . auth()->user()->icon) }}" width="100" height="100" style="object-fit: cover; border-radius:50%; background-color: #F2F2F2"><h1 style="color: #4B3D3D; font-family: 'Bold', sans-serif;">Account Details for: {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h1>
        </div>
        <div class="mb-3">
            <a href="/profile/edit" class="btn" style="background-color: #D4BFBB; color: #4B3D3D; font-family: 'Regular', sans-serif;">Edit Account</a>
            <form action="{{ route('users.destroy') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?');" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Account</button>
            </form>
        </div>
    </div>

    <div class="card mb-2 py-4 px-4 pt-4 pb-2 border-0 d-flex justify-content-center" style="background-color: #D4BFBB; width: fit-content">
        <div class="d-flex justify-content-center" style="gap: 7px;">
            <div class="card mb-3 pl-2 pr-2 p-2 border-0 d-flex justify-content-center" style="background-color: rgba(255, 255, 255, 0.25); width: 250px;">
                <div style="display: flex; gap: 5px;">
                    <b style="color: #4B3D3D; font-family: 'Regular', sans-serif;">First Name: </b> <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ auth()->user()->first_name }}</span>
                </div>
            </div>
            <div class="card mb-3 pl-2 pr-2 p-2 border-0 d-flex justify-content-center" style="background-color: rgba(255, 255, 255, 0.25); width: 250px;">
                <div style="display: flex; gap: 5px;">
                    <b style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Last Name: </b> <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ auth()->user()->last_name }}</span>
                </div>
            </div>
            <div class="card mb-3 pl-2 pr-2 p-2 border-0 d-flex justify-content-center" style="background-color: rgba(255, 255, 255, 0.25); width: 250px;">
                <div style="display: flex; gap: 5px;">
                    <b style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Email: </b> <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ auth()->user()->email }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-2 py-4 px-4 pt-4 pb-2 border-0 d-flex justify-content-center" style="background-color: #D4BFBB; width: fit-content">
        <div class="d-flex justify-content-center" style="gap: 7px;">
            <div class="card mb-3 pl-2 pr-2 p-2 border-0 d-flex justify-content-center" style="background-color: rgba(255, 255, 255, 0.25); width: 250px;">
                <div style="display: flex; gap: 5px;">
                    <b style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Number of Pets: </b> <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ auth()->user()->pets->count() }}</span>
                </div>
            </div>
            <div class="card mb-3 pl-2 pr-2 p-2 border-0 d-flex justify-content-center" style="background-color: rgba(255, 255, 255, 0.25); width: 250px;">
                <div style="display: flex; gap: 5px;">
                    <b style="color: #4B3D3D; font-family: 'Regular', sans-serif;">Number of Friends: </b> <span style="color: #4B3D3D; font-family: 'Regular', sans-serif;">{{ auth()->user()->following->count() }}</span>
                </div>
            </div>
        </div>
    </div>

@endsection