blade
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-2xl font-bold mb-4">Comment Detail</h1>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="text">
                    Text:
                </label>
                <p class="border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $comment->text }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="bug">
                    Bug:
                </label>
                <p class="border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $comment->bug->name }}</p>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="user">
                    User:
                </label>
                <p class="border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $comment->user->name }}</p>
            </div>

            <a href="{{ route('comments.edit', $comment->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update Comment
            </a>
        </div>
    </div>
@endsection