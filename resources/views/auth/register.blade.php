blade
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Create User</h1>

        <form action="{{ route('users.store') }}" method="POST" class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
            @csrf
