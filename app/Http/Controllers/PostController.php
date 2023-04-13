<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->with('user')->paginate(10);
        $tags = Tag::all();
        return view('posts.index', compact('posts','tags'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Post::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'user_id' => auth()->user()->id,
        ]);
        // Handle tags
        $tagIds = $request->input('tags', []);

        $tags = [];

        foreach ($tagIds as $tagId) {
            $tag = Tag::find($tagId);

            if ($tag) {
                $tags[] = $tag->id;
            }
        }

        $post->tags()->sync($tags);
        return redirect('/posts')->with('success', 'Post has been added');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();
        return view('posts.edit', compact('post','tags'));
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->save();
        // Handle tags
        $tagNames = explode(',', $request->tags);
        $tags = [];
        foreach ($tagNames as $tagName) {
            $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
            $tags[] = $tag->id;
        }
        $post->tags()->sync($tags);

        return redirect('/posts')->with('success', 'Post has been updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
    // app/Http/Controllers/BlogPostController.php

    public function filterByTag(Tag $tag)
    {
        $posts = $tag->posts()->paginate(10);

        return view('posts.index', compact('posts'));
    }

}
