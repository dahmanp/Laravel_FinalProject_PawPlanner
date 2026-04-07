@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Welcome to PawPlanner!</h1>
    <p>Hello <strong>{{ Auth::user()->first_name }}</strong>, You are logged in!</p>
@endsection