<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        $postsCountByUser = User::select('users.name', DB::raw('COUNT(posts.id) AS num_posts'))
            ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
            ->groupBy('users.id', 'users.name')
            ->get();
        $commentsCountByUser = User::select('users.name', DB::raw('COUNT(comments.id) AS num_comments'))
            ->leftJoin('comments', 'users.id', '=', 'comments.user_id')
            ->groupBy('users.id', 'users.name')
            ->get();
        $topCommenters = User::select('users.name', DB::raw('COUNT(comments.id) AS num_comments'))
            ->leftJoin('comments', 'users.id', '=', 'comments.user_id')
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('num_comments')
            ->limit(5)
            ->get();
        $topCommentedPosts = Post::select('posts.id', 'posts.title', DB::raw('COUNT(comments.id) AS num_comments'))
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->groupBy('posts.id', 'posts.title')
            ->orderByDesc('num_comments')
            ->limit(5)
            ->get();
        $mostCommonTags = Tag::select('tags.name', DB::raw('COUNT(post_tag.tag_id) AS num_tags'))
            ->join('post_tag', 'tags.id', '=', 'post_tag.tag_id')
            ->groupBy('tags.name')
            ->orderByDesc('num_tags')
            ->limit(5)
            ->get();
        $postsWithMostTags = Post::select('posts.id', 'posts.title', DB::raw('COUNT(post_tag.tag_id) AS num_tags'))
            ->join('post_tag', 'posts.id', '=', 'post_tag.post_id')
            ->groupBy('posts.id', 'posts.title')
            ->orderByDesc('num_tags')
            ->limit(5)
            ->get();
        $usersWithNoComments = User::whereDoesntHave('comments')->get();

        return view('statistics.index', compact(
            'postsCountByUser',
            'commentsCountByUser',
            'topCommenters',
            'topCommentedPosts',
            'mostCommonTags',
            'postsWithMostTags',
            'usersWithNoComments',
        ));
    }
}
