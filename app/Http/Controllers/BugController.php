php
<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BugController extends Controller
{
    /**
     * Display a listing of the bugs.
     */
    public function index(): View
    {
        $bugs = Bug::with('project', 'assignedTo')->get();
        return view('bugs.index', ['bugs' => $bugs]);
    }

    /**
     * Show the form for creating a new bug.
     */
    public function create(): View
    {
        $projects = \App\Models\Project::all();
        $users = \App\Models\User::all();
        return view('bugs.create', [
            'projects' => $projects, 'users' => $users
        ]);
    }

    /**
     * Store a newly created bug in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required'],
            'project_id' => ['required', 'exists:projects,id'],
            'status' => ['required', 'string'],
            'priority' => ['required', 'string'],
            'assigned_to' => ['required', 'exists:users,id'],
        ]);

        $bug = Bug::create($validated);
        if ($bug->assigned_to) {
            $bug->assignedTo()->associate($bug->assigned_to)->save();
        }

        return redirect()->route('bugs.index')->with('success', 'Bug created successfully.');
    }

    /**
     * Display the specified bug.
     */
    public function show(Bug $bug): View
    {
        return view('bugs.show', ['bug' => $bug->load('project', 'assignedTo')]);
    }

    /**
     * Show the form for editing the specified bug.
     */
    public function edit(Bug $bug): View
    {
        $projects = \App\Models\Project::all();
        $users = \App\Models\User::all();
        return view('bugs.edit', ['bug' => $bug->load('project', 'assignedTo'),
            'projects' => $projects, 'users' => $users
        ]);
    }

    /**
     * Update the specified bug in storage.
     */
    public function update(Request $request, Bug $bug): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required'],
            'project_id' => ['required', 'exists:projects,id'],
            'status' => ['required', 'string'],
            'priority' => ['required', 'string'],
            'assigned_to' => ['required', 'exists:users,id'],
        ]);
        $bug->update($validated);        

        return redirect()->route('bugs.index')->with('success', 'Bug updated successfully.');
    }

    /**
     * Remove the specified bug from storage.
     */
    public function destroy(Bug $bug): RedirectResponse
    {
        $bug->delete();

        return redirect()->route('bugs.index')->with('success', 'Bug deleted successfully.');
    }
}