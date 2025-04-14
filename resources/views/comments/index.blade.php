blade
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Comments</h1>

        <div class="mb-4">
            <a href="{{ route('comments.create', ['bug' => $bug->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create Comment
            </a>
        </div>

        @if(count($comments) > 0)
            <div class="grid gap-4">
                @foreach($comments as $comment)
                    <div class="bg-white shadow rounded p-4">
                        <p class="text-gray-700">{{ $comment->text }}</p>
                        <p class="text-sm text-gray-500">By: {{ $comment->user->name }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p>No comments yet.</p>
        @endif
    </div>
@endsection