@extends('layouts.student')

@section('content-header')
    <h1>Dashboard</h1>
@endsection

@section('content')
    <p>Welcome {{ auth()->user()->name }}. This is your student panel.</p>
@endsection
