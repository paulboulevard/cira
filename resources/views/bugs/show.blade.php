blade
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-2xl font-bold mb-6">Bug Details</h1>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <p class="text-gray-900">{{ $bug->name }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                    Status
                </label>
                <p class="text-gray-900">{{ $bug->status }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Description
                </label>
                <p class="text-gray-900">{{ $bug->description }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="priority">
                    Priority
                </label>
                <p class="text-gray-900">{{ $bug->priority }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="project">
                    Project
                </label>
                <p class="text-gray-900">{{ $bug->project->name }}</p>
            </div>

            <a href="{{ route('bugs.edit', $bug->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update Bug
            </a>
        </div>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-bold mb-4">Comments</h2>

            <ul>
                @foreach ($bug->comments as $comment)
                    <li class="mb-2 p-2 bg-gray-100 rounded">
                        <p>{{ $comment->text }}</p>
                        <p class="text-sm text-gray-500">By: {{ $comment->user->name }}</p>
                    </li>
                @endforeach
            </ul>

            <a href="{{ route('comments.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Add Comment
            </a>
        </div>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-bold mb-4">Attachments</h2>

            @if($bug->attachments->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($bug->attachments as $attachment)
                        <div class="bg-gray-100 p-4 rounded-lg shadow-inner">
                            <h3 class="font-semibold text-gray-700">{{ $attachment->name }}</h3>
                            <a href="{{ Storage::url($attachment->file_path) }}" target="_blank" class="text-blue-500 hover:underline">
                                Download
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No attachments yet.</p>
            @endif

            <a href="{{ route('attachments.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-4 inline-block">
                Add Attachment
            </a>


        </div>
    </div>
@endsection
