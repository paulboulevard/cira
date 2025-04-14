php
<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Bug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Bug $bug)
    {
        $attachments = $bug->attachments;
        return view('attachments.index', compact('attachments', 'bug'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Bug $bug)
    {
        return view('attachments.create', compact('bug'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Bug $bug)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'file_path' => 'required|file',
            'bug_id'    => 'required|exists:bugs,id',
        ]);

        $path = $request->file('file_path')->store('attachments', 'public');

        Attachment::create(['name' => $request->name, 'file_path' => $path, 'bug_id' => $request->bug_id]);


        return redirect()->route('bugs.show', $bug)->with('success', 'Attachment created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attachment $attachment)
    {
        return view('attachments.edit', compact('attachment'));
    }

    public function update(Request $request, Attachment $attachment)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'file_path' => 'required|file',
            'bug_id'    => 'required|exists:bugs,id',
        ]);

        $attachment->name = $request->name;
        $attachment->bug_id = $request->bug_id;
        if ($request->hasFile('file_path')) {


            Storage::disk('public')->delete($attachment->file_path);
            $file = $request->file('file');
            $path = $file->store('attachments', 'public');
            $attachment->file_path = $path;
        } 
        $attachment->name = $validated['name'];
        $attachment->save();
        return redirect()->route('attachments.show', $attachment)->with('success', 'Attachment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attachment $attachment)
    {
        Storage::disk('public')->delete($attachment->file_path);
        $attachment->delete();
        return redirect()->back()->with('success', 'Attachment deleted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attachment $attachment)
    {
        return view('attachments.show', compact('attachment'));
    }
}