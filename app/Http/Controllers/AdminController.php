<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    // Show some statistics or information about the site
    $user_id = auth()->user()->id;
      // In your controller
        $postsCountByUser = Post::select($user_id, DB::raw('COUNT(*) as num_posts'))
            ->groupBy('user_id')
            ->get();

        return view('dashboard', compact('postsCountByUser'));
    }

}
