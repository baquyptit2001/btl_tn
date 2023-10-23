<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post_ids = \App\Models\HomePost::query()
            ->orderBy('order')
            ->pluck('post_id')
            ->toArray();
        $posts = \App\Models\Post::query()
            ->whereIn('posts.id', $post_ids)
            ->join('home_posts', 'posts.id', '=', 'home_posts.post_id')
            ->orderBy('home_posts.order')
            ->get();
        return view('home', compact('posts'));
    }
}
