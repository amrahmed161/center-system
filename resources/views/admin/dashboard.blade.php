@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Welcome, {{ Auth::user()->name }}</h2>
        <p>You are logged in as <strong>Admin</strong>.</p>
    </div>
@endsection

