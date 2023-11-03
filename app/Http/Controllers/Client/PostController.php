<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show(Post $post, Request $request)
    {
        $post->views()->create([
            'post_id' => $post->id,
            'user_id' => Auth::check() ? auth()->user()->id : null,
        ]);
        return view('pages.post', compact('post'));
    }
}
