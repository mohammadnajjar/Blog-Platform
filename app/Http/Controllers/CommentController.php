<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function index()
    {
        $comments = $this->comment->with(['user', 'post'])->latest()->paginate(10);

        return view('comments.index', compact('comments'));
    }


    public function create()
    {
        $users = User::all();
        $posts = Post::all();

        return view('comments.create', compact('users', 'posts'));
    }

    public function store()
    {
        // Validate the request data
        $validatedData = request()->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string',
        ]);

        // Create a new comment with the validated data and the authenticated user's ID
        $comment = new Comment([
            'post_id' => $validatedData['post_id'],
            'content' => $validatedData['content'],
            'user_id' => Auth::id(),
        ]);

        // Save the comment to the database
        $comment->status = 'pending';
        $comment->save();

        // Redirect to the index page with a success message
        return redirect()->route('comments.index')->with('success', __('Comment created successfully.'));
    }



    public function show(Comment $comment)
    {
        $comment->load(['user', 'post']);

        return view('comments.show', compact('comment'));
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.edit', compact('comment'));
    }

    public function update($id)
    {
        $comment = Comment::findOrFail($id);

        $validatedData = Validator::make(request()->all(), [
            'content' => 'required|string|max:255',
        ])->validate();

        $comment->content = $validatedData['content'];
        $comment->save();

        return redirect()->route('comments.index')->with('success', __('Comment updated successfully.'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comments.index')->with('success', __('Comment deleted successfully!'));
    }
    public function admin()
    {
        $comments = $this->comment->with(['user', 'post'])->latest()->get();

        return view('comments.admin', compact('comments'));
    }
    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->status = 'approved';
        $comment->save();
        return redirect()->back()->with('success', __('Comment rejected successfully.'));
    }

    public function reject($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->status = 'rejected';
        $comment->save();

        return redirect()->back()->with('success', __('Comment rejected successfully.'));
    }

    public function updateStatus($id, $status)
    {
        $comment = Comment::findOrFail($id);
        $comment->status = $status;
        $comment->save();

        return redirect()->back()->with('success', __('Comment status updated successfully.'));
    }

}
