php
<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($bugId)
    {
        $comments = Comment::where('bug_id', $bugId)->with('user')->get();
        return view('comments.index', compact('comments', 'bugId'));
    }

    public function create($bugId)
    {
        return view('comments.create', compact('bugId'));
    }

    public function store(Request $request, $bugId)
    {
        $validatedData = $request->validate([
            'text' => 'required',
            'user_id' => 'required|exists:users,id',
            'bug_id' => 'required|exists:bugs,id',        ]);

        $comment = new Comment();
        $comment->text = $validatedData['text'];
        $comment->user_id = $validatedData['user_id'];
        $comment->bug_id = $bugId;
        $comment->save();

        return redirect()->route('bugs.show', $bugId)->with('success', 'Comment created successfully.');
    }

    public function show($bugId, $commentId)
    {
        $comment = Comment::where('bug_id', $bugId)->findOrFail($commentId);
        return view('comments.show', compact('comment', 'bugId'));
    }

    public function edit($bugId, $commentId)
    {
        $comment = Comment::where('bug_id', $bugId)->findOrFail($commentId);
        return view('comments.edit', compact('comment', 'bugId'));
    }

    public function update(Request $request, $bugId, $commentId)
    {
        $validatedData = $request->validate([
            'text' => 'required',
            'user_id' => 'required|exists:users,id',
            'bug_id' => 'required|exists:bugs,id',
        ]);

        $comment = Comment::where('bug_id', $bugId)->findOrFail($commentId);
        $comment->text = $validatedData['text'];
        $comment->save();

        return redirect()->route('bugs.show', $bugId)->with('success', 'Comment updated successfully.');
    }

    public function destroy($bugId, $commentId)
    {
        $comment = Comment::where('bug_id', $bugId)->findOrFail($commentId);
        $comment->delete();
        return redirect()->route('bugs.show', $bugId)->with('success', 'Comment deleted successfully.');
    }
}