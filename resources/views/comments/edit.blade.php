blade
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Edit Comment</h1>

        <form action="{{ route('comments.update', $comment->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="text" class="block text-gray-700 text-sm font-bold mb-2">Text</label>
                <textarea name="text" id="text" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('text', $comment->text) }}</textarea>
                @error('text')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">User</label>
                <select name="user_id" id="user_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach(\App\Models\User::all() as $user)
                        <option value="{{ $user->id }}" {{ old('user_id', $comment->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="bug_id" class="block text-gray-700 text-sm font-bold mb-2">Bug</label>
                <select name="bug_id" id="bug_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach(\App\Models\Bug::all() as $bug)
                        <option value="{{ $bug->id }}" {{ old('bug_id', $comment->bug_id) == $bug->id ? 'selected' : '' }}>{{ $bug->name }}</option>
                    @endforeach
                </select>
                @error('bug_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Comment
                </button>
            </div>
        </form>
    </div>
@endsection