blade
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-2xl font-bold mb-4">{{ $project->name }}</h1>
            <div class="mb-4">
                <p class="text-gray-700">
                    <span class="font-semibold">Status:</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $project->status }}</span>
                </p>
            </div>
            <div class="mb-6">
                <p class="text-gray-700">
                    <span class="font-semibold">Description:</span>
                    {{ $project->description }}
                </p>
            </div>
            <div class="flex items-center justify-between">
              <a href="{{ route('projects.edit', $project->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update Project
              </a>
            </div>
        </div>
    </div>
@endsection