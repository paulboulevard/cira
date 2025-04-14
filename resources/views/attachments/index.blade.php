blade
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Attachments</h1>

        <div class="mb-4">
            <a href="{{ route('attachments.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create New Attachment
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse($attachments as $attachment)
                <div class="bg-white shadow rounded p-4">
                    <h2 class="text-lg font-semibold mb-2">{{ $attachment->name }}</h2>
                    <a href="{{ Storage::url($attachment->file_path) }}" download class="text-blue-500 hover:text-blue-700">
                        Download
                    </a>
                </div>
            @empty
                <div class="text-gray-500">
                    No attachments found.
                </div>
            @endforelse
        </div>
    </div>
@endsection