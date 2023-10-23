<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::all();
        return view('admin.pages.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.pages.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->name;
        $post->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $post->image = storePostImage($request);
        }
        $post->content = $request->get('content');
        $post->user_id = auth()->user()->id;
        $post->save();
    }
}
