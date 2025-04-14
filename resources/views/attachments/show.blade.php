blade
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Attachment Details</h1>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <p class="mb-4">
                <span class="font-bold">Name:</span> {{ $attachment->name }}
            </p>

            <p class="mb-4">
                <span class="font-bold">Bug:</span> {{ $attachment->bug->name }}
            </p>

            <p class="mb-4">
                <span class="font-bold">File Path:</span> {{ $attachment->file_path }}
            </p>
            <p class="mb-4">
                <span class="font-bold">Download Link:</span>
                 <a href="{{ asset('storage/' . $attachment->file_path) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" download>Download</a>
            </p>

            <a href="{{ route('attachments.edit', $attachment) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Edit Attachment
            </a>
        </div>
    </div>
@endsection