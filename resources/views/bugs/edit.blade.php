blade
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Bug</h1>

        <form action="{{ route('bugs.update', $bug->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $bug->name }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $bug->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="project_id" class="block text-gray-700 text-sm font-bold mb-2">Project</label>
                <select name="project_id" id="project_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ $bug->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                <select name="status" id="status" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="open" {{ $bug->status == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="in progress" {{ $bug->status == 'in progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="resolved" {{ $bug->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                    <option value="closed" {{ $bug->status == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="priority" class="block text-gray-700 text-sm font-bold mb-2">Priority</label>
                <select name="priority" id="priority" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="low" {{ $bug->priority == 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ $bug->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="high" {{ $bug->priority == 'high' ? 'selected' : '' }}>High</option>
                    <option value="critical" {{ $bug->priority == 'critical' ? 'selected' : '' }}>Critical</option>
                </select>
            </div>
            
            <div class="mb-4">
                <label for="assigned_to" class="block text-gray-700 text-sm font-bold mb-2">Assigned To</label>
                <select name="assigned_to" id="assigned_to" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $bug->assigned_to == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
            </div>
        </form>
    </div>
@endsection